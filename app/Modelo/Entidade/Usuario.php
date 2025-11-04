<?php
//Esse codigo serve para representar um usuario com dados de identificação e acesso ao app. Todos esses dados baseados no banco de dados
class Usuario
{
   // private pode ser acessado apenas dentro da propria classe

    private $id; //  identificação do usuario em uma variavel inteira
    private $nome; // Nome do usuário em uma string  
    private $senha; // senha do usuário em uma  string  
    private $perfil; // nivel de permissão do usuario dentro do aplicativo
    private $dataCadastro;// data de criação da conta do usuario em uma string 

   //a parte debaixo serve para criar o usuario utilizando o construct e as variáveis da parte de cima
    public function __construct(
        string $nome
        string $senha
        string $perfil = 'comum'
        string $dataCadastro = null
        int $id = null
    ) {
        $this->id = $id;
        $this->nome = $nome;
        $this->senha = $senha;
        $this->perfil = $perfil;
        $this->dataCadastro  = $dataCadastro ?? date('Y-m-d H:i:s');
       //nessa parte acima é a parte do código aonde o valor do parâmetro vai ser redirecionado para dentro da variável e as duas interrogações servem para caso não informar a data, vire a data do dia atual. 
    }

    // Nessa parte do código estamos acessando as variáveis private com o public e o get criando uma função de retorno para elas sendo int ou string.

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function getPerfil(): ?string
    {
        return $this->perfil;
    }

    public function getDataCadastro(): ?string
    {
        return $this->dataCadastro;
    }
}
?>