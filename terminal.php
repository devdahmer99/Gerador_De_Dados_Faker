<?php

require_once 'DataGenerator.php';

class TerminalInterface
{
    private $generator;
    
    public function __construct()
    {
        $this->generator = new DataGenerator();
    }
    
    public function executar()
    {
        $this->exibirBanner();
        
        while (true) {
            $this->exibirMenu();
            $opcao = $this->lerEntrada("Escolha uma opção: ");
            
            switch ($opcao) {
                case '1':
                    $this->menuDadosPessoais();
                    break;
                case '2':
                    $this->menuDadosEmpresa();
                    break;
                case '3':
                    $this->menuCartaoCredito();
                    break;
                case '4':
                    $this->gerarDadosCompletos();
                    break;
                case '5':
                    $this->exportarDados();
                    break;
                case '0':
                    echo "Saindo...\n";
                    exit(0);
                default:
                    echo "Opção inválida!\n\n";
            }
        }
    }
    
    private function exibirBanner()
    {
        echo "\n";
        echo "╔══════════════════════════════════════════════════════════════╗\n";
        echo "║                    GERADOR DE DADOS FAKES                   ║\n";
        echo "║                        Versão 1.0                           ║\n";
        echo "║                     Desenvolvido Por:                       ║\n";
        echo "║           Eduardo Dahmer Correa - Full Stack Developer      ║\n";
        echo "╚══════════════════════════════════════════════════════════════╝\n";
        echo "\n";
    }
    
    private function exibirMenu()
    {
        echo "┌─────────────────────────────────────────────────────────────┐\n";
        echo "│                        MENU PRINCIPAL                       │\n";
        echo "├─────────────────────────────────────────────────────────────┤\n";
        echo "│ 1. Dados Pessoais                                          │\n";
        echo "│ 2. Dados de Empresa                                        │\n";
        echo "│ 3. Cartão de Crédito                                       │\n";
        echo "│ 4. Gerar Dados Completos                                   │\n";
        echo "│ 5. Exportar Dados                                          │\n";
        echo "│ 0. Sair                                                    │\n";
        echo "└─────────────────────────────────────────────────────────────┘\n";
    }
    
    private function menuDadosPessoais()
    {
        echo "\n┌─────────────────────────────────────────────────────────────┐\n";
        echo "│                      DADOS PESSOAIS                        │\n";
        echo "├─────────────────────────────────────────────────────────────┤\n";
        echo "│ 1. Nome Completo                                           │\n";
        echo "│ 2. CPF                                                     │\n";
        echo "│ 3. RG                                                      │\n";
        echo "│ 4. Telefone                                                │\n";
        echo "│ 5. Celular                                                 │\n";
        echo "│ 6. Email                                                   │\n";
        echo "│ 7. Escolaridade                                            │\n";
        echo "│ 8. Filiação (Pai e Mãe)                                   │\n";
        echo "│ 9. Endereço Completo                                       │\n";
        echo "│ 10. Dados Pessoais Completos                              │\n";
        echo "│ 0. Voltar                                                  │\n";
        echo "└─────────────────────────────────────────────────────────────┘\n";
        
        $opcao = $this->lerEntrada("Escolha uma opção: ");
        
        switch ($opcao) {
            case '1':
                $quantidade = $this->lerQuantidade();
                for ($i = 0; $i < $quantidade; $i++) {
                    echo "Nome: " . $this->generator->gerarNome() . "\n";
                }
                break;
            case '2':
                $quantidade = $this->lerQuantidade();
                for ($i = 0; $i < $quantidade; $i++) {
                    echo "CPF: " . $this->generator->gerarCPF() . "\n";
                }
                break;
            case '3':
                $quantidade = $this->lerQuantidade();
                for ($i = 0; $i < $quantidade; $i++) {
                    echo "RG: " . $this->generator->gerarRG() . "\n";
                }
                break;
            case '4':
                $quantidade = $this->lerQuantidade();
                for ($i = 0; $i < $quantidade; $i++) {
                    echo "Telefone: " . $this->generator->gerarTelefone() . "\n";
                }
                break;
            case '5':
                $quantidade = $this->lerQuantidade();
                for ($i = 0; $i < $quantidade; $i++) {
                    echo "Celular: " . $this->generator->gerarCelular() . "\n";
                }
                break;
            case '6':
                $quantidade = $this->lerQuantidade();
                for ($i = 0; $i < $quantidade; $i++) {
                    echo "Email: " . $this->generator->gerarEmail() . "\n";
                }
                break;
            case '7':
                $quantidade = $this->lerQuantidade();
                for ($i = 0; $i < $quantidade; $i++) {
                    echo "Escolaridade: " . $this->generator->gerarEscolaridade() . "\n";
                }
                break;
            case '8':
                $quantidade = $this->lerQuantidade();
                for ($i = 0; $i < $quantidade; $i++) {
                    $filiacao = $this->generator->gerarFiliacao();
                    echo "Pai: " . $filiacao['pai'] . "\n";
                    echo "Mãe: " . $filiacao['mae'] . "\n";
                    if ($i < $quantidade - 1) echo "---\n";
                }
                break;
            case '9':
                $quantidade = $this->lerQuantidade();
                for ($i = 0; $i < $quantidade; $i++) {
                    $endereco = $this->generator->gerarEndereco();
                    echo "Endereço:\n";
                    echo "  " . $endereco['logradouro'] . ", " . $endereco['numero'] . "\n";
                    if ($endereco['complemento']) echo "  " . $endereco['complemento'] . "\n";
                    echo "  " . $endereco['bairro'] . "\n";
                    echo "  " . $endereco['cidade'] . " - " . $endereco['estado'] . "\n";
                    echo "  CEP: " . $endereco['cep'] . "\n";
                    if ($i < $quantidade - 1) echo "---\n";
                }
                break;
            case '10':
                $quantidade = $this->lerQuantidade();
                for ($i = 0; $i < $quantidade; $i++) {
                    $pessoa = $this->generator->gerarPessoaCompleta();
                    $this->exibirPessoaCompleta($pessoa);
                    if ($i < $quantidade - 1) echo str_repeat("=", 60) . "\n";
                }
                break;
            case '0':
                return;
            default:
                echo "Opção inválida!\n";
        }
        
        echo "\nPressione Enter para continuar...";
        readline();
    }
    
    private function menuDadosEmpresa()
    {
        echo "\n┌─────────────────────────────────────────────────────────────┐\n";
        echo "│                     DADOS DE EMPRESA                       │\n";
        echo "├─────────────────────────────────────────────────────────────┤\n";
        echo "│ 1. Nome da Empresa                                         │\n";
        echo "│ 2. CNPJ                                                    │\n";
        echo "│ 3. Inscrição Estadual                                      │\n";
        echo "│ 4. Email Corporativo                                       │\n";
        echo "│ 5. Dados da Empresa Completos                              │\n";
        echo "│ 0. Voltar                                                  │\n";
        echo "└─────────────────────────────────────────────────────────────┘\n";
        
        $opcao = $this->lerEntrada("Escolha uma opção: ");
        
        switch ($opcao) {
            case '1':
                $quantidade = $this->lerQuantidade();
                for ($i = 0; $i < $quantidade; $i++) {
                    echo "Empresa: " . $this->generator->gerarNomeEmpresa() . "\n";
                }
                break;
            case '2':
                $quantidade = $this->lerQuantidade();
                for ($i = 0; $i < $quantidade; $i++) {
                    echo "CNPJ: " . $this->generator->gerarCNPJ() . "\n";
                }
                break;
            case '3':
                $quantidade = $this->lerQuantidade();
                for ($i = 0; $i < $quantidade; $i++) {
                    echo "Inscrição Estadual: " . $this->generator->gerarEscricaoEstatual() . "\n";
                }
                break;
            case '4':
                $quantidade = $this->lerQuantidade();
                for ($i = 0; $i < $quantidade; $i++) {
                    echo "Email Corporativo: " . $this->generator->gerarEmailEmpresa() . "\n";
                }
                break;
            case '5':
                $quantidade = $this->lerQuantidade();
                for ($i = 0; $i < $quantidade; $i++) {
                    $empresa = $this->generator->gerarDadosEmpresaCompleta();
                    $this->exibirEmpresaCompleta($empresa);
                    if ($i < $quantidade - 1) echo str_repeat("=", 60) . "\n";
                }
                break;
            case '0':
                return;
            default:
                echo "Opção inválida!\n";
        }
        
        echo "\nPressione Enter para continuar...";
        readline();
    }
    
    private function menuCartaoCredito()
    {
        echo "\n┌─────────────────────────────────────────────────────────────┐\n";
        echo "│                    CARTÃO DE CRÉDITO                        │\n";
        echo "├─────────────────────────────────────────────────────────────┤\n";
        echo "│ 1. Cartão Aleatório                                        │\n";
        echo "│ 2. Cartão Visa                                             │\n";
        echo "│ 3. Cartão Mastercard                                       │\n";
        echo "│ 4. Cartão American Express                                 │\n";
        echo "│ 5. Cartão Elo                                              │\n";
        echo "│ 6. Cartão com Nome Personalizado                           │\n";
        echo "│ 7. Pessoa + Cartão Vinculado                               │\n";
        echo "│ 0. Voltar                                                  │\n";
        echo "└─────────────────────────────────────────────────────────────┘\n";
        
        $opcao = $this->lerEntrada("Escolha uma opção: ");
        
        switch ($opcao) {
            case '1':
            case '2':
            case '3':
            case '4':
            case '5':
                $bandeiras = [null, 'Visa', 'Mastercard', 'American Express', 'Elo'];
                $bandeira = $bandeiras[$opcao - 1];
                
                $quantidade = $this->lerQuantidade();
                for ($i = 0; $i < $quantidade; $i++) {
                    $cartao = $this->generator->gerarCartaoCredito($bandeira);
                    $this->exibirCartao($cartao);
                    if ($i < $quantidade - 1) echo "---\n";
                }
                break;
                
            case '6':
                $nomePersonalizado = $this->lerEntrada("Digite o nome do titular: ");
                $bandeira = $this->lerEntrada("Bandeira (1-Visa, 2-Master, 3-Amex, 4-Elo, Enter-Aleatório): ");
                
                $bandeiras = [null, 'Visa', 'Mastercard', 'American Express', 'Elo'];
                $bandeiraEscolhida = ($bandeira >= 1 && $bandeira <= 4) ? $bandeiras[$bandeira] : null;
                
                $quantidade = $this->lerQuantidade();
                for ($i = 0; $i < $quantidade; $i++) {
                    $cartao = $this->generator->gerarCartaoCredito($bandeiraEscolhida, $nomePersonalizado);
                    $this->exibirCartao($cartao);
                    if ($i < $quantidade - 1) echo "---\n";
                }
                break;
                
            case '7':
                $quantidade = $this->lerQuantidade();
                for ($i = 0; $i < $quantidade; $i++) {
                    $pessoaComCartao = $this->generator->gerarPessoaComCartao();
                    
                    echo "DADOS PESSOAIS:\n";
                    echo "  Nome: " . $pessoaComCartao['pessoa']['nome'] . "\n";
                    echo "  CPF: " . $pessoaComCartao['pessoa']['cpf'] . "\n";
                    echo "  Email: " . $pessoaComCartao['pessoa']['email'] . "\n";
                    echo "  Telefone: " . $pessoaComCartao['pessoa']['telefone'] . "\n";
                    
                    echo "\nCARTÃO VINCULADO:\n";
                    $this->exibirCartao($pessoaComCartao['cartao']);
                    
                    if ($i < $quantidade - 1) echo str_repeat("=", 60) . "\n";
                }
                break;
                
            case '0':
                return;
            default:
                echo "Opção inválida!\n";
                return;
        }
        
        echo "\nPressione Enter para continuar...";
        readline();
    }

    private function exibirCartao($cartao)
    {
        echo "┌─────────────────────────────────────────────────────────────┐\n";
        echo "│ Bandeira: " . str_pad($cartao['bandeira'], 15, ' ', STR_PAD_RIGHT) . "                              │\n";
        echo "│                                                             │\n";
        echo "│ " . str_pad($cartao['numero'], 19, ' ', STR_PAD_RIGHT) . "                              │\n";
        echo "│                                                             │\n";
        echo "│ " . str_pad($cartao['titular'], 25, ' ', STR_PAD_RIGHT) . "                        │\n";
        echo "│                                                             │\n";
        echo "│ Validade: " . str_pad($cartao['validade'], 7, ' ', STR_PAD_RIGHT) . "     CVC: " . str_pad($cartao['cvc'], 3, ' ', STR_PAD_RIGHT) . "              │\n";
        echo "└─────────────────────────────────────────────────────────────┘\n";
    }
    
    private function gerarDadosCompletos()
    {
        echo "\n┌─────────────────────────────────────────────────────────────┐\n";
        echo "│                    DADOS COMPLETOS                          │\n";
        echo "├─────────────────────────────────────────────────────────────┤\n";
        echo "│ 1. Pessoa + Cartão Vinculado                               │\n";
        echo "│ 2. Empresa + Responsável                                    │\n";
        echo "│ 3. Dataset Completo (Pessoa + Empresa + Cartão)            │\n";
        echo "│ 4. Família (Múltiplas pessoas + Cartões)                   │\n";
        echo "│ 0. Voltar                                                  │\n";
        echo "└─────────────────────────────────────────────────────────────┘\n";
        
        $opcao = $this->lerEntrada("Escolha uma opção: ");
        
        switch ($opcao) {
            case '1':
                $quantidade = $this->lerQuantidade();
                for ($i = 0; $i < $quantidade; $i++) {
                    $pessoaComCartao = $this->generator->gerarPessoaComCartao();
                    
                    $this->exibirPessoaCompleta($pessoaComCartao['pessoa']);
                    echo "\nCartão de Crédito:\n";
                    $this->exibirCartao($pessoaComCartao['cartao']);
                    
                    if ($i < $quantidade - 1) echo str_repeat("=", 60) . "\n";
                }
                break;
                
            case '2':
                $quantidade = $this->lerQuantidade();
                for ($i = 0; $i < $quantidade; $i++) {
                    $empresa = $this->generator->gerarDadosEmpresaCompleta();
                    $responsavel = $this->generator->gerarPessoaCompleta();
                    $cartaoEmpresa = $this->generator->gerarCartaoCredito(null, $responsavel['nome']);
                    
                    $this->exibirEmpresaCompleta($empresa);
                    echo "\nResponsável:\n";
                    echo "  Nome: " . $responsavel['nome'] . "\n";
                    echo "  CPF: " . $responsavel['cpf'] . "\n";
                    echo "  Email: " . $responsavel['email'] . "\n";
                    echo "  Telefone: " . $responsavel['telefone'] . "\n";
                    echo "\nCartão Corporativo:\n";
                    $this->exibirCartao($cartaoEmpresa);
                    
                    if ($i < $quantidade - 1) echo str_repeat("=", 60) . "\n";
                }
                break;
                
            case '3':
                $quantidade = $this->lerQuantidade();
                for ($i = 0; $i < $quantidade; $i++) {
                    $pessoa = $this->generator->gerarPessoaCompleta();
                    $empresa = $this->generator->gerarDadosEmpresaCompleta();
                    $cartao = $this->generator->gerarCartaoCredito(null, $pessoa['nome']);
                    
                    echo "PESSOA FÍSICA:\n";
                    $this->exibirPessoaCompleta($pessoa);
                    
                    echo "\nEMPRESA:\n";
                    $this->exibirEmpresaCompleta($empresa);
                    
                    echo "\nCARTÃO DE CRÉDITO:\n";
                    $this->exibirCartao($cartao);
                    
                    if ($i < $quantidade - 1) echo str_repeat("=", 60) . "\n";
                }
                break;
                
            case '4':
                $quantidade = $this->lerQuantidade();
                for ($i = 0; $i < $quantidade; $i++) {
                    echo "FAMÍLIA " . ($i + 1) . ":\n";
                    echo str_repeat("-", 40) . "\n";
                    
                    $numeroMembros = rand(2, 4);
                    for ($j = 0; $j < $numeroMembros; $j++) {
                        $pessoa = $this->generator->gerarPessoaCompleta();
                        $cartao = $this->generator->gerarCartaoCredito(null, $pessoa['nome']);
                        
                        echo "\nMembro " . ($j + 1) . ":\n";
                        echo "  Nome: " . $pessoa['nome'] . "\n";
                        echo "  CPF: " . $pessoa['cpf'] . "\n";
                        echo "  Email: " . $pessoa['email'] . "\n";
                        echo "  Cartão: " . $cartao['numero'] . " (" . $cartao['bandeira'] . ")\n";
                        echo "  Titular: " . $cartao['titular'] . "\n";
                    }
                    
                    if ($i < $quantidade - 1) echo str_repeat("=", 60) . "\n";
                }
                break;
                
            case '0':
                return;
            default:
                echo "Opção inválida!\n";
        }
        
        echo "\nPressione Enter para continuar...";
        readline();
    }
    
    private function exportarDados()
    {
        echo "\n┌─────────────────────────────────────────────────────────────┐\n";
        echo "│                      EXPORTAR DADOS                         │\n";
        echo "├─────────────────────────────────────────────────────────────┤\n";
        echo "│ 1. JSON                                                    │\n";
        echo "│ 2. CSV                                                     │\n";
        echo "│ 3. TXT                                                     │\n";
        echo "│ 0. Voltar                                                  │\n";
        echo "└─────────────────────────────────────────────────────────────┘\n";
        
        $opcao = $this->lerEntrada("Escolha uma opção: ");
        
        if ($opcao == '0') return;
        
        $quantidade = $this->lerQuantidade();
        $tipo = $this->lerEntrada("Tipo de dados (1-Pessoa, 2-Empresa, 3-Completo): ");
        
        $dados = [];
        for ($i = 0; $i < $quantidade; $i++) {
            switch ($tipo) {
                case '1':
                    $dados[] = $this->generator->gerarPessoaCompleta();
                    break;
                case '2':
                    $dados[] = $this->generator->gerarDadosEmpresaCompleta();
                    break;
                case '3':
                    $dados[] = [
                        'pessoa' => $this->generator->gerarPessoaCompleta(),
                        'empresa' => $this->generator->gerarDadosEmpresaCompleta(),
                        'cartao' => $this->generator->gerarCartaoCredito()
                    ];
                    break;
            }
        }
        
        $nomeArquivo = 'dados_fake_' . date('Y-m-d_H-i-s');
        
        switch ($opcao) {
            case '1':
                $nomeArquivo .= '.json';
                file_put_contents($nomeArquivo, json_encode($dados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                break;
            case '2':
                $nomeArquivo .= '.csv';
                $this->exportarCSV($dados, $nomeArquivo);
                break;
            case '3':
                $nomeArquivo .= '.txt';
                $this->exportarTXT($dados, $nomeArquivo);
                break;
        }
        
        echo "Dados exportados para: " . $nomeArquivo . "\n";
        echo "\nPressione Enter para continuar...";
        readline();
    }
    
     private function exportarCSV($dados, $nomeArquivo)
    {
        $handle = fopen($nomeArquivo, 'w');
        
        if (!empty($dados)) {
            $primeiroItem = $dados[0];
            if (isset($primeiroItem['pessoa'])) {
                // Dados completos
                $cabecalho = [
                    'nome', 'cpf', 'rg', 'email', 'telefone', 
                    'razao_social', 'cnpj', 
                    'numero_cartao', 'titular_cartao', 'bandeira', 'cvc', 'validade'
                ];
            } elseif (isset($primeiroItem['cnpj'])) {
                // Empresa
                $cabecalho = array_keys($primeiroItem);
            } else {
                // Pessoa
                $cabecalho = array_keys($primeiroItem);
            }
            
            fputcsv($handle, $cabecalho);
            
            // Dados
            foreach ($dados as $item) {
                if (isset($item['pessoa'])) {
                    $linha = [
                        $item['pessoa']['nome'],
                        $item['pessoa']['cpf'],
                        $item['pessoa']['rg'],
                        $item['pessoa']['email'],
                        $item['pessoa']['telefone'],
                        $item['empresa']['razao_social'] ?? '',
                        $item['empresa']['cnpj'] ?? '',
                        $item['cartao']['numero'],
                        $item['cartao']['titular'],
                        $item['cartao']['bandeira'],
                        $item['cartao']['cvc'],
                        $item['cartao']['validade']
                    ];
                } else {
                    $linha = array_values($item);
                }
                fputcsv($handle, $linha);
            }
        }
        
        fclose($handle);
    }
    
    private function exportarTXT($dados, $nomeArquivo)
    {
        $conteudo = "";
        
        foreach ($dados as $i => $item) {
            $conteudo .= "REGISTRO " . ($i + 1) . "\n";
            $conteudo .= str_repeat("-", 40) . "\n";
            
            if (isset($item['pessoa'])) {
                $conteudo .= "PESSOA:\n";
                $conteudo .= "Nome: " . $item['pessoa']['nome'] . "\n";
                $conteudo .= "CPF: " . $item['pessoa']['cpf'] . "\n";
                $conteudo .= "Email: " . $item['pessoa']['email'] . "\n";
                $conteudo .= "\nEMPRESA:\n";
                $conteudo .= "Razão Social: " . $item['empresa']['razao_social'] . "\n";
                $conteudo .= "CNPJ: " . $item['empresa']['cnpj'] . "\n";
                $conteudo .= "\nCARTÃO:\n";
                $conteudo .= "Número: " . $item['cartao']['numero'] . "\n";
                $conteudo .= "Bandeira: " . $item['cartao']['bandeira'] . "\n";
            } else {
                foreach ($item as $chave => $valor) {
                    if (is_array($valor)) {
                        $conteudo .= ucfirst($chave) . ":\n";
                        foreach ($valor as $subChave => $subValor) {
                            $conteudo .= "  " . ucfirst($subChave) . ": " . $subValor . "\n";
                        }
                    } else {
                        $conteudo .= ucfirst($chave) . ": " . $valor . "\n";
                    }
                }
            }
            
            $conteudo .= "\n";
        }
        
        file_put_contents($nomeArquivo, $conteudo);
    }
    
    private function exibirPessoaCompleta($pessoa)
    {
        echo "DADOS PESSOAIS:\n";
        echo "  Nome: " . $pessoa['nome'] . "\n";
        echo "  CPF: " . $pessoa['cpf'] . "\n";
        echo "  RG: " . $pessoa['rg'] . "\n";
        echo "  Telefone: " . $pessoa['telefone'] . "\n";
        echo "  Celular: " . $pessoa['celular'] . "\n";
        echo "  Email: " . $pessoa['email'] . "\n";
        echo "  Escolaridade: " . $pessoa['escolaridade'] . "\n";
        echo "  Pai: " . $pessoa['filiacao']['pai'] . "\n";
        echo "  Mãe: " . $pessoa['filiacao']['mae'] . "\n";
        echo "  Endereço: " . $pessoa['endereco']['logradouro'] . ", " . $pessoa['endereco']['numero'] . "\n";
        if ($pessoa['endereco']['complemento']) {
            echo "           " . $pessoa['endereco']['complemento'] . "\n";
        }
        echo "           " . $pessoa['endereco']['bairro'] . "\n";
        echo "           " . $pessoa['endereco']['cidade'] . " - " . $pessoa['endereco']['estado'] . "\n";
        echo "           CEP: " . $pessoa['endereco']['cep'] . "\n";
    }
    
    private function exibirEmpresaCompleta($empresa)
    {
        echo "DADOS DA EMPRESA:\n";
        echo "  Razão Social: " . $empresa['razao_social'] . "\n";
        echo "  Nome Fantasia: " . $empresa['nome_fantasia'] . "\n";
        echo "  CNPJ: " . $empresa['cnpj'] . "\n";
        echo "  Inscrição Estadual: " . $empresa['inscricao_estadual'] . "\n";
        echo "  Email: " . $empresa['email_corporativo'] . "\n";
        echo "  Telefone: " . $empresa['telefone'] . "\n";
        echo "  Endereço: " . $empresa['endereco']['logradouro'] . ", " . $empresa['endereco']['numero'] . "\n";
        if ($empresa['endereco']['complemento']) {
            echo "           " . $empresa['endereco']['complemento'] . "\n";
        }
        echo "           " . $empresa['endereco']['bairro'] . "\n";
        echo "           " . $empresa['endereco']['cidade'] . " - " . $empresa['endereco']['estado'] . "\n";
        echo "           CEP: " . $empresa['endereco']['cep'] . "\n";
    }
    
    private function lerEntrada($prompt)
    {
        echo $prompt;
        return trim(fgets(STDIN));
    }
    
    private function lerQuantidade()
    {
        do {
            $quantidade = $this->lerEntrada("Quantidade de registros: ");
            if (!is_numeric($quantidade) || $quantidade < 1) {
                echo "Digite um número válido maior que 0!\n";
            }
        } while (!is_numeric($quantidade) || $quantidade < 1);
        
        return (int)$quantidade;
    }
}

// Executar o terminal
$terminal = new TerminalInterface();
$terminal->executar();