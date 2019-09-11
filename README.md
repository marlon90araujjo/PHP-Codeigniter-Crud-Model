# PHP Codeigniter Crud_model

<pre>Carregue o arquivo no autoload</pre>

- Usar para Insert
<pre>
  $this->crud->inserir('nome_tabela', array());
</pre>

- Usar para Update
<pre>
  $this->crud->atualizar('nome_tabela', array(), $where);
</pre>

- Usar para Delete (com prefixo no fim)
<pre>
  $this->crud->excluir('nome_tabela', 'prefixo', $valor);
  // nome do campo codigo_pes -> prefixo (pes)
</pre>

- Usar para Delete Livre
<pre>
  $this->crud->excluir_condicionado('nome_tabela', $where);
</pre>

- Usar para Select
<pre>
  $this->crud->buscar('campos', 'nome_tabela', 'where', 'order', 'join[]');
</pre>

- Usar para Select Livre
<pre>
  $this->crud->busca_livre('select * from');
</pre>
