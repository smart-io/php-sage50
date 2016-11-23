<?php

namespace Smart\Sage50\Doctrine;

use Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper;
use Doctrine\ORM\Tools\Console\Command\ConvertMappingCommand;
use Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Helper\HelperSet;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateEntityCommand extends Command
{
    /**
     * @var Doctrine
     */
    private $doctrine;

    /**
     * @var QuestionHelper
     */
    private $question;

    /**
     * @var string
     */
    private $srcDir;

    /**
     * @param Doctrine $doctrine
     */
    public function __construct(Doctrine $doctrine)
    {
        $this->srcDir = dirname(__DIR__);
        $this->question = new QuestionHelper();
        $this->doctrine = $doctrine;
        parent::__construct();
    }

    /**
     * @var string
     */
    private $table;

    protected function configure()
    {
        $this->setName('generate-entity')->setDescription('Generate entity from a table');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!$table = $this->getTable()) {
            $table = $this->question->ask($output, 'Table name: ');
        }

        $words = explode('_', $table);
        $entity = '';
        foreach ($words as $word) {
            if (substr($word, -1) === 's') {
                $word = substr($word, 0, -1);
            }
            $entity .= ucfirst($word);
        }
        $entity = $entity . '/' . $entity . 'Entity';

        $directory = trim(dirname($entity), '/');
        $entity = str_replace('.php', null, basename($entity));

        $dirPath = $this->srcDir . DIRECTORY_SEPARATOR . $directory;

        if (file_exists($dirPath  . DIRECTORY_SEPARATOR . $entity . '.php')) {
            $output->write('[ <fg=red>Failed: Entity ' . $directory  . DIRECTORY_SEPARATOR . $entity . ' already exists</fg=red> ]', true);
            return;
        }

        if (!is_dir($dirPath)) {
            mkdir($dirPath, 0777, true);
        }

        // Execute doctrine command
        $fileListBefore = scandir($dirPath);
        $filter = str_replace(' ', '', ucwords(str_replace('_', ' ', $table)));
        $command = new ConvertMappingCommand();

        $helperSet = new HelperSet(array(
            'db' => new ConnectionHelper($this->doctrine->getEntityManager()->getConnection()),
            'em' => new EntityManagerHelper($this->doctrine->getEntityManager())
        ));

        $command->setHelperSet($helperSet);

        $this->doctrine->getEntityManager()->getConfiguration()->setFilterSchemaAssetsExpression('/^' . $table . '$/i');

        $command->run(new ArrayInput([
            'to-type'    => 'annotation',
            'dest-path' => $this->srcDir . "/{$directory}",
            '--from-database' => true,
            '--filter' => $filter
        ]), new ConsoleOutput());

        $fileListAfter = scandir($dirPath);

        // Move file to right location
        $file = current(array_diff($fileListAfter, $fileListBefore));
        if (!$file) {
            throw new \Exception('No entity generated');
        }
        $filePath = $dirPath . DIRECTORY_SEPARATOR . $file;

        rename($filePath, $dirPath . DIRECTORY_SEPARATOR . $entity . '.php');
        $filePath = $dirPath . DIRECTORY_SEPARATOR . $entity . '.php';

        $fileContent = file_get_contents($filePath);

        // Fix classes and namespace
        $fileContent = str_replace('<?php', '', $fileContent);
        $fileContent = str_replace('class ' . str_replace('.php', '', $file), 'class ' . $entity, $fileContent);
        $fileContent = str_replace(' * ' . str_replace('.php', '', $file) . PHP_EOL .' *' . PHP_EOL, '', $fileContent);
        $fileContent = str_replace('\\DateTime', 'DateTime', $fileContent);
        $fileContent = str_replace('@var boolean', '@var bool', $fileContent);
        $fileContent = str_replace('@var integer', '@var int', $fileContent);
        $fileContent = str_replace(', nullable=false', '', $fileContent);
        $fileContent = str_replace("\n\n}", "}", $fileContent);

        // Fix table and entity inversion
        $fileContent = preg_replace('/(.*)@ORM\\\Table(.*)\n(.*)@ORM\\\Entity(.*)\n/im', "$3@ORM\\Entity$4\n$1@ORM\\Table$2\n", $fileContent);

        // Fix ids docblock
        $fileContent = str_replace('GeneratedValue(strategy="IDENTITY")', 'GeneratedValue', $fileContent);
        $fileContent = preg_replace('/(.*)@var(.*)\n(.*)\n(.*)@ORM\\\Column(.*)\n(.*)@ORM\\\Id\n(.*)@ORM\\\GeneratedValue(.*)\n/im', "$6@ORM\\Id\n$4@ORM\\Column$5\n$7@ORM\\GeneratedValue$8\n$1@var$2\n", $fileContent);

        // Fix docblock
        $fileContent = preg_replace('/(.*)@var(.*)\n(.*)\n(.*)@ORM\\\Column(.*)\n/im', "$4@ORM\\Column$5\n$1@var$2\n", $fileContent);

        // Fix booleans
        $fileContent = preg_replace('/(.*)@var bool(.*)\n(.*)\n(.*)private(.*)\'0\';/im', "$1@var bool$2\n$3\n$4private$5false;", $fileContent);
        $fileContent = preg_replace('/(.*)@var bool(.*)\n(.*)\n(.*)private(.*)\'1\';/im', "$1@var bool$2\n$3\n$4private$5true;", $fileContent);

        // Fix int
        $fileContent = preg_replace('/(.*)@var int(.*)\n(.*)\n(.*)private(.*)\'(\d*)\';/im', "$1@var int$2\n$3\n$4private$5$6;", $fileContent);

        // Append file namespace
        $fileContent = '<?php' . PHP_EOL . 'namespace ' . trim($this->getNamespace(), '\\/') . '\\' . str_replace('/', '\\', trim($directory, '\\/')) . ';' . PHP_EOL . 'use DateTime;' . PHP_EOL . PHP_EOL . trim($fileContent);

        // Fix enums
        /** @var \Doctrine\DBAL\Driver\PDOConnection $conn */
        $conn = $this->doctrine->getEntityManager()->getConnection()->getWrappedConnection();
        $query = "SHOW COLUMNS FROM `{$table}`";
        foreach  ($conn->query($query) as $row) {
            if (substr($row['Type'], 0, 4) === 'enum') {
                $definition = 'columnDefinition="ENUM' . substr($row['Type'], 4) . '"';
                $fileContent = str_replace('name="' . $row['Field'] . '", type="string"', 'name="' . $row['Field'] . '", type="string", ' . $definition, $fileContent);
            }
        }

        // Save changes
        file_put_contents($filePath, $fileContent .PHP_EOL);

        $output->write('[ <fg=green>Success: Created entity ' . $directory . DIRECTORY_SEPARATOR . $entity . '</fg=green> ]', true);
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param string $table
     * @return $this
     */
    public function setTable($table)
    {
        $this->table = $table;
        return $this;
    }

    public function getNamespace()
    {
        $className = str_replace('\\', '/', get_class($this));
        return str_replace('/', '\\', dirname(dirname($className)));
    }
}
