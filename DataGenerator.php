<?php

class DataGenerator {
    private $nomes = [
        'masculino' => [
            'João', 'José', 'Antonio', 'Francisco', 'Carlos', 'Paulo', 'Pedro', 'Lucas', 'Luiz', 'Marcos',
            'Luis', 'Gabriel', 'Rafael', 'Daniel', 'Marcelo', 'Bruno', 'Eduardo', 'Felipe', 'Raimundo', 'Rodrigo',
            'Manoel', 'Nelson', 'Roberto', 'Antônio', 'Fernando', 'Jorge', 'Andrey', 'Adriano', 'Fábio', 'Márcio'
        ],
        'feminino' => [
             'Maria', 'Ana', 'Francisca', 'Antonia', 'Adriana', 'Juliana', 'Márcia', 'Fernanda', 'Patricia', 'Aline',
            'Sandra', 'Camila', 'Amanda', 'Bruna', 'Jessica', 'Leticia', 'Julia', 'Luciana', 'Vanessa', 'Mariana',
            'Gabriela', 'Valeria', 'Cristina', 'Simone', 'Priscila', 'Tatiane', 'Silvia', 'Luana', 'Fabiana', 'Rosana'
        ]
    ];

    private $sobrenomes = [
        'Silva', 'Santos', 'Oliveira', 'Souza', 'Rodrigues', 'Ferreira', 'Alves', 'Pereira', 'Lima', 'Gomes',
        'Ribeiro', 'Carvalho', 'Castro', 'Almeida', 'Lopes', 'Soares', 'Vieira', 'Macedo', 'Melo', 'Barbosa',
        'Martins', 'Araújo', 'Rocha', 'Monteiro', 'Moreira', 'Mendes', 'Cardoso', 'Reis', 'Nascimento', 'Moura'
    ];

    private $escolaridades = [
        'Ensino Fundamental Incompleto',
        'Ensino Fundamental Completo',
        'Ensino Médio Incompleto',
        'Ensino Médio Completo',
        'Ensino Superior Incompleto',
        'Ensino Superior Completo',
        'Pós-graduação',
        'Mestrado',
        'Doutorado'
    ];

    private $empresasTipos = [
        'Tech', 'Consultoria', 'Comércio', 'Serviços', 'Indústria', 'Alimentação',
        'Saúde', 'Educação', 'Transporte', 'Construção', 'Financeira', 'Energia'
    ];

    private $empresasNomes = [
        'Inovação', 'Soluções', 'Sistemas', 'Tecnologia', 'Digital', 'Smart',
        'Global', 'Brasil', 'Nacional', 'Premium', 'Express', 'Master'
    ];

    private $dominiosEmail = [
         'gmail.com', 'hotmail.com', 'yahoo.com.br', 'outlook.com', 'uol.com.br',
        'terra.com.br', 'ig.com.br', 'globo.com', 'bol.com.br', 'r7.com'
    ];

    private $bandeirasCartao = [
        'Visa' => '4',
        'Mastercard' => '5',
        'American Express' => '3',
        'Elo' => '6'
    ];

    public function gerarCPF(): string {

        $cpf = '';
        for($i = 0; $i < 9; $i++) {
            $cpf .= rand(0,9);
        }

        $soma = 0;
        for($i = 0; $i < 9; $i++) {
            $soma += intval($cpf[$i]) * (10 - $i);
        }

        $resto = $soma % 11;
        $digito1 = $resto < 2 ? 0 : 11 - $resto;
        $cpf .= $digito1;

        $soma = 0;
        for($i = 0; $i < 10; $i++) {
            $soma += intval($cpf[$i]) * (11 - $i);
        }
        $resto = $soma % 11;
        $digito2 = $resto < 2 ? 0 : 11 - $resto;
        $cpf .= $digito2;

        return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
    }


    public function gerarCNPJ():string {

      $cnpj = '';
        for ($i = 0; $i < 12; $i++) {
            $cnpj .= rand(0, 9);
        }

        $multiplicadores1 = [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
        $soma = 0;
        for ($i = 0; $i < 12; $i++) {
            $soma += intval($cnpj[$i]) * $multiplicadores1[$i];
        }
        $resto = $soma % 11;
        $digito1 = ($resto < 2) ? 0 : 11 - $resto;
        $cnpj .= $digito1;

        $multiplicadores2 = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
        $soma = 0;
        for ($i = 0; $i < 13; $i++) {
            $soma += intval($cnpj[$i]) * $multiplicadores2[$i];
        }
        $resto = $soma % 11;
        $digito2 = ($resto < 2) ? 0 : 11 - $resto;
        $cnpj .= $digito2;

        return substr($cnpj, 0, 2) . '.' . substr($cnpj, 2, 3) . '.' . substr($cnpj, 5, 3) . '/' . substr($cnpj, 8, 4) . '-' . substr($cnpj, 12, 2);  
    }

    public function gerarNome($genero = null): string {

        if($genero === null) {
            $genero = rand(0,1) ? 'masculino' : 'feminino';
        }

        $nome = $this->nomes[$genero][array_rand($this->nomes[$genero])];
        $sobrenome1 = $this->sobrenomes[array_rand($this->sobrenomes)];
        $sobrenome2 = $this->sobrenomes[array_rand($this->sobrenomes)];
        
        return $nome . ' ' . $sobrenome1 . ' ' . $sobrenome2;
    }

    public function gerarNomeEmpresa(): string {

        $tipo = $this->empresasTipos[array_rand($this->empresasTipos)];
        $nome = $this->empresasNomes[array_rand($this->empresasNomes)];
        $sufixo = ['Ltda', 'S/A', 'ME', 'EPP'][array_rand(['Ltda', 'S/A', 'ME', 'EPP'])];
        
        return $nome . ' ' . $tipo . ' ' . $sufixo;
    }

    public function gerarTelefone(): string {

        $ddd = str_pad(rand(11, 99), 2, '0', STR_PAD_LEFT);
        $numero = '9' . str_pad(rand(10000000, 99999999), 8, '0', STR_PAD_LEFT);
        return "({$ddd}) {$numero}";
    }

    public function gerarCelular(): string {

        $ddd = str_pad(rand(11, 99), 2, '0', STR_PAD_LEFT);
        $numero = '9' . str_pad(rand(10000000, 99999999), 8, '0', STR_PAD_LEFT);
        return "({$ddd}) 9{$numero}";
    }

    public function gerarEmail($nome = null): string {

        if ($nome === null) {
            $nome = $this->gerarNome();
        }
        
        $nomeEmail = strtolower(str_replace(' ', '.', $this->removerAcentos($nome)));
        $dominio = $this->dominiosEmail[array_rand($this->dominiosEmail)];
        $numero = rand(1, 999);
        
        return $nomeEmail . $numero . '@' . $dominio;
    }

    public function gerarRG(): string {

        $rg = '';
        for ($i = 0; $i < 8; $i++) {
            $rg .= rand(0, 9);
        }
        $digito = chr(rand(65, 90)); // Letra aleatória
        
        return substr($rg, 0, 2) . '.' . substr($rg, 2, 3) . '.' . substr($rg, 5, 3) . '-' . $digito;
    }

    public function gerarEscolaridade(): string {
        return $this->escolaridades[array_rand($this->escolaridades)];
    }

    public function gerarFiliacao(): array {

        $pai = $this->gerarNome('masculino');
        $mae = $this->gerarNome('feminino');
        
        return [
            'pai' => $pai,
            'mae' => $mae
        ];
    }

    public function gerarEscricaoEstatual(): string {

         $ie = '';
        for ($i = 0; $i < 9; $i++) {
            $ie .= rand(0, 9);
        }
        
        return substr($ie, 0, 3) . '.' . substr($ie, 3, 3) . '.' . substr($ie, 6, 3);
    }

    public function gerarEmpresa(): string {

        $tipo = $this->empresasTipos[array_rand($this->empresasTipos)];
        $nome = $this->empresasNomes[array_rand($this->empresasNomes)];
        $sufixo = ['Ltda', 'S/A', 'ME', 'EPP'][array_rand(['Ltda', 'S/A', 'ME', 'EPP'])];
        
        return $nome . ' ' . $tipo . ' ' . $sufixo;
    }

    public function gerarEmailEmpresa($nomeEmpresa = null): string {

        if ($nomeEmpresa === null) {
            $nomeEmpresa = $this->gerarNomeEmpresa();
        }
        
        $dominio = strtolower(str_replace([' ', '/'], ['', ''], $this->removerAcentos($nomeEmpresa)));
        $dominio = preg_replace('/[^a-z0-9]/', '', $dominio);
        $nome = strtolower(str_replace(' ', '.', $this->removerAcentos($this->gerarNome())));
        
        return $nome . '@' . substr($dominio, 0, 10) . '.com.br';
    }

    public function gerarCartaoCredito($bandeira = null, $nomePersonalizado = null): array {

        if ($bandeira === null) {
            $bandeiras = array_keys($this->bandeirasCartao);
            $bandeira = $bandeiras[array_rand($bandeiras)];
        }
        
        $prefixo = $this->bandeirasCartao[$bandeira];
        $numero = $prefixo;
        
        // Gerar os dígitos restantes
        for ($i = 1; $i < 16; $i++) {
            $numero .= rand(0, 9);
        }
        
        // Calcular dígito verificador usando algoritmo de Luhn
        $soma = 0;
        $alternar = false;
        
        for ($i = strlen($numero) - 1; $i >= 0; $i--) {
            $digito = intval($numero[$i]);
            
            if ($alternar) {
                $digito *= 2;
                if ($digito > 9) {
                    $digito = ($digito % 10) + 1;
                }
            }
            
            $soma += $digito;
            $alternar = !$alternar;
        }
        
        $numeroFormatado = substr($numero, 0, 4) . ' ' . substr($numero, 4, 4) . ' ' . 
                          substr($numero, 8, 4) . ' ' . substr($numero, 12, 4);
        
        $nomeTitular = $nomePersonalizado ? $nomePersonalizado : $this->gerarNome();
        $nomeTitularCartao = strtoupper($this->removerAcentos($nomeTitular));                  

        return [
            'bandeira' => $bandeira,
            'numero' => $numeroFormatado,
            'titular' => $nomeTitularCartao,
            'cvc' => str_pad(rand(100, 999), 3, '0', STR_PAD_LEFT),
            'validade' => $this->gerarDataExpiracao()
        ];
    }

    public function gerarCartaoComTitular($dadosPessoa = null): array {
        return $this->gerarCartaoCredito(null, $dadosPessoa['nome']);
    }

    public function gerarPessoaComCartao(): array {
        $pessoa = $this->gerarPessoaCompleta();
        $cartao = $this->gerarCartaoCredito(null, $pessoa['nome']);

        return [
            'pessoa' => $pessoa,
            'cartao' => $cartao
         ];
    }

    public function gerarDataExpiracao(): string{

        $mes = str_pad(rand(1, 12), 2, '0', STR_PAD_LEFT);
        $ano = rand(2024, 2030);
        return $mes . '/' . $ano;
    }

    private function removerAcentos($string): string {

        $acentos = [
            'á' => 'a', 'à' => 'a', 'ã' => 'a', 'â' => 'a', 'ä' => 'a',
            'é' => 'e', 'è' => 'e', 'ê' => 'e', 'ë' => 'e',
            'í' => 'i', 'ì' => 'i', 'î' => 'i', 'ï' => 'i',
            'ó' => 'o', 'ò' => 'o', 'õ' => 'o', 'ô' => 'o', 'ö' => 'o',
            'ú' => 'u', 'ù' => 'u', 'û' => 'u', 'ü' => 'u',
            'ç' => 'c', 'ñ' => 'n',
            'Á' => 'A', 'À' => 'A', 'Ã' => 'A', 'Â' => 'A', 'Ä' => 'A',
            'É' => 'E', 'È' => 'E', 'Ê' => 'E', 'Ë' => 'E',
            'Í' => 'I', 'Ì' => 'I', 'Î' => 'I', 'Ï' => 'I',
            'Ó' => 'O', 'Ò' => 'O', 'Õ' => 'O', 'Ô' => 'O', 'Ö' => 'O',
            'Ú' => 'U', 'Ù' => 'U', 'Û' => 'U', 'Ü' => 'U',
            'Ç' => 'C', 'Ñ' => 'N'
        ];
        
        return strtr($string, $acentos);
    }

    public function gerarEndereco(): array {

        $ruas = ['Rua', 'Avenida', 'Travessa', 'Alameda', 'Praça'];
        $nomes = ['das Flores', 'do Sol', 'da Paz', 'dos Anjos', 'Central', 'Principal'];
        
        return [
            'logradouro' => $ruas[array_rand($ruas)] . ' ' . $nomes[array_rand($nomes)],
            'numero' => rand(1, 9999),
            'complemento' => rand(0, 1) ? 'Apto ' . rand(1, 999) : '',
            'bairro' => ['Centro', 'Jardim América', 'Vila Nova', 'Cidade Alta'][array_rand(['Centro', 'Jardim América', 'Vila Nova', 'Cidade Alta'])],
            'cidade' => ['São Paulo', 'Rio de Janeiro', 'Belo Horizonte', 'Salvador'][array_rand(['São Paulo', 'Rio de Janeiro', 'Belo Horizonte', 'Salvador'])],
            'estado' => 'SP',
            'cep' => str_pad(rand(10000, 99999), 5, '0', STR_PAD_LEFT) . '-' . str_pad(rand(100, 999), 3, '0', STR_PAD_LEFT)
        ];
    }

    public function gerarPessoaCompleta(): array {

        $nome = $this->gerarNome();
        $filiacao = $this->gerarFiliacao();
        $endereco = $this->gerarEndereco();
        
        return [
            'nome' => $nome,
            'cpf' => $this->gerarCPF(),
            'rg' => $this->gerarRG(),
            'telefone' => $this->gerarTelefone(),
            'celular' => $this->gerarCelular(),
            'email' => $this->gerarEmail($nome),
            'escolaridade' => $this->gerarEscolaridade(),
            'filiacao' => $filiacao,
            'endereco' => $endereco
        ];
    }

    public function gerarDadosEmpresaCompleta(): array {
        $nomeEmpresa = $this->gerarNomeEmpresa();
        $endereco = $this->gerarEndereco();
        
        return [
            'razao_social' => $nomeEmpresa,
            'nome_fantasia' => explode(' ', $nomeEmpresa)[0] . ' ' . explode(' ', $nomeEmpresa)[1],
            'cnpj' => $this->gerarCNPJ(),
            'inscricao_estadual' => $this->gerarEscricaoEstatual(),
            'email_corporativo' => $this->gerarEmailEmpresa($nomeEmpresa),
            'telefone' => $this->gerarTelefone(),
            'endereco' => $endereco
        ];
    }
}