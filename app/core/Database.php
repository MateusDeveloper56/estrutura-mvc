<?php 
namespace App\Core;

class Database {
    private ?\PDO $pdo = null;
    private static ?self $instance = null;

    private function __construct() {
        $this->connect();
    }

    /**
     * @method Implementação do padrão Singleton para garantir que apenas uma instância de Database seja criada durante a execução do aplicativo.
     */
    public static function getInstance(): self {
        /**
         * Verifica se a instância já foi criada. Se não, cria uma nova instância da classe Database e a armazena na propriedade estática $instance. Retorna a instância existente ou recém-criada.
         */
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function connect(): bool {
        $dbConfig = config('db');
        
        $dsn = "mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']};charset={$dbConfig['charset']}";

        $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new \PDO($dsn, $dbConfig['username'], $dbConfig['password'], $options);
            return true;

        } catch (\PDOException $e) {
            throw new \PDOException('Erro na conexão: '.$e->getMessage(), (int) $e->getCode());
        }

        return false;
    }

    public function query(string $sql, array $params = []): \PDOStatement {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt;

        } catch (\PDOException $e) {
            throw new \PDOException('Erro na execução da query: '.$e->getMessage(), (int) $e->getCode());
        }
    }

    public function fetch(string $sql, array $params = []): array|false {
        $stmt = $this->query($sql, $params);
        return $stmt->fetch();
    }

    public function fetchAll(string $sql, array $params = []): array {
        $stmt = $this->query($sql, $params);
        return $stmt->fetchAll();
    }

    /**
     * @method Retorna o número de linhas afetadas por uma operação de inserção, atualização ou exclusão. Ele executa a consulta SQL usando o método query e retorna o número de linhas afetadas usando o método rowCount() do objeto PDOStatement.
     */
    public function execute(string $sql, array $params = []): string {
        $stmt = $this->query($sql, $params);
        return $stmt->rowCount();
    }

    public function rowCount(string $sql, array $params = []): int {
        $stmt = $this->query($sql, $params);
        return $stmt->rowCount();
    }

    public function lastInsertId(): string {
        return $this->pdo->lastInsertId();
    }
}


