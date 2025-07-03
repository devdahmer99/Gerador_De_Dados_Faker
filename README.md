# Gerador de Dados Fakes em PHP

## 📝 Descrição

Este é um sistema simples desenvolvido em PHP para a geração de dados fakes (falsos) diretamente pelo terminal. É uma ferramenta útil para desenvolvedores e testadores que precisam de dados de exemplo para preencher bancos de dados, testar APIs ou qualquer outra finalidade que necessite de informações fictícias.

A aplicação gera dados como informações pessoais, dados de empresas e números de cartão de crédito.

## 🛠️ Desenvolvido Por

- **Eduardo Dahmer Correa** - Full Stack Developer

## 🚀 Como Usar

Para utilizar o gerador, siga os passos abaixo. É necessário ter o PHP instalado em sua máquina.

1.  **Clone o repositório (se ainda não o fez):**
    ```bash
    git clone [https://github.com/seu-usuario/Gerador_De_Dados_Fake.git](https://github.com/seu-usuario/Gerador_De_Dados_Fake.git)
    ```

2.  **Acesse a pasta do projeto:**
    ```bash
    cd Gerador_De_Dados_Fake
    ```

3.  **Execute o arquivo principal via terminal:**
    ```bash
    php terminal.php
    ```

## ⚙️ Funcionalidades

Ao executar o script, um menu principal será exibido no terminal, permitindo que você escolha o tipo de dado que deseja gerar.
![image](https://github.com/user-attachments/assets/8c4b0503-22da-4de7-ab0d-a090df98ddb3)

### Opções do Menu

-   **1. Dados Pessoais:** Gera um conjunto de dados pessoais fictícios (ex: nome, CPF, RG, data de nascimento, etc.).
-   **2. Dados de Empresa:** Gera informações comerciais fictícias (ex: nome da empresa, CNPJ, endereço, etc.).
-   **3. Cartão de Crédito:** Gera um número de cartão de crédito válido (seguindo o algoritmo de Luhn), com data de validade e código de segurança (CVV).
-   **4. Gerar Dados Completos:** Gera um pacote completo com dados pessoais, de empresa e de cartão de crédito de uma só vez.
-   **5. Exportar Dados:** Permite salvar os dados gerados em um arquivo.
-   **0. Sair:** Encerra a execução do programa.

Após escolher qualquer uma das opções de geração, os dados correspondentes serão exibidos diretamente no seu terminal.

## 🤝 Contribuições

Contribuições são bem-vindas! Sinta-se à vontade para abrir uma *issue* ou enviar um *pull request*.

## 📄 Licença

Este projeto é distribuído sob a licença MIT. Veja o arquivo `LICENSE` para mais detalhes.
