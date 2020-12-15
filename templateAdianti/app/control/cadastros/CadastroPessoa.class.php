<?php
    /**
     *
     * @version    1.0
     * @package    dbprogweb_t2
     * @author     Felipe Xaud
     */
    class CadastroPessoa extends TPage
    {
        private $form;      // registration form
        private $datagrid;  // listing
        private $loaded;
        
        /**
         * Class constructor
         * Creates the page, the form and the listing
         */
        public function __construct()
        {
            parent::__construct();
            
            // create the form
            $this->form = new BootstrapFormBuilder('form_pessoa');
            $this->form->setFormTitle('Cadastro Pessoa');
            
            // create the form fields
            $id     = new TEntry('id_pessoa');
            $nome   = new TEntry('nome');
            $cpf   = new TEntry('cpf');
            $dataNascimento   = new TDate('data_nascimento');
            $rg   = new TEntry('rg');
            $sexo   = new TRadioGroup('sexo');
            $cep   = new TEntry('cep');
            $endereco   = new TEntry('endereco');
            $numero   = new TEntry('numero');
            $bairro   = new TEntry('bairro');
            $cidade   = new TEntry('cidade');
            $estado   = new TCombo('estado');
            $nomePai   = new TEntry('nome_pai');
            $nomeMae   = new TEntry('nome_mae');
            $telefone   = new TEntry('telefone');
            $email   = new TEntry('email'); 

            $itemsSexo = ['Masculino'=>'Masc.', 'Feminino'=>'Fem.', 'Indefinido'=>'Indef.']; 
            $itemsEstado = ['AC' => 'Acre',
                        'AL' => 'Alagoas',
                        'AM' => 'Amazonas', 
                        'BA' => 'Bahia', 
                        'CE' => 'Ceara', 
                        'ES' => 'Espirito Santo', 
                        'GO' => 'Goias', 
                        'MA' => 'Maranhao', 
                        'MT' => 'Mato Grosso', 
                        'MG' => 'Minas Gerais', 
                        'PA' => 'Para', 
                        'PB' => 'Paraiba', 
                        'PR' => 'Parana', 
                        'PE' => 'Pernambuco', 
                        'PI' => 'Piaui', 
                        'RJ' => 'Rio de Janeiro', 
                        'RN' => 'Rio Grande do Norte', 
                        'RS' => 'Rio Grande do Sul', 
                        'RO' => 'Rondonia', 
                        'RR' => 'Roraima', 
                        'SC' => 'Santa Catarina', 
                        'SP' => 'Sao Paulo', 
                        'SE' => 'Sergipe', 
                        'TO' => 'Tocantins', 
                        'DF' => 'Distrito Federal'               
        ];

            $sexo->addItems($itemsSexo); 
            $sexo->setLayout('horizontal');
            $estado->addItems($itemsEstado);

            //add masks 
            $cpf->setMask('999.999.999-99');
            $cep->setMask('99999-999');
            $telefone->setMask('(99)99999-9999');
            
            // add the fields in the form
            $this->form->addFields( [new TLabel('ID')],    [$id] );
            $this->form->addFields( [new TLabel('Nome', 'red')],  [$nome] );
            $this->form->addFields( [new TLabel('CPF')],  [$cpf] );
            $this->form->addFields( [new TLabel('Data de Nascimento')],  [$dataNascimento] );
            $this->form->addFields( [new TLabel('RG')],  [$rg] );
            $this->form->addFields( [new TLabel('Sexo')],  [$sexo] );
            $this->form->addFields( [new TLabel('CEP')],  [$cep] );
            $this->form->addFields( [new TLabel('Endereco')],  [$endereco] );
            $this->form->addFields( [new TLabel('Numero')],  [$numero] );
            $this->form->addFields( [new TLabel('Bairro')],  [$bairro] );
            $this->form->addFields( [new TLabel('Cidade')],  [$cidade] );
            $this->form->addFields( [new TLabel('Estado')],  [$estado] );
            $this->form->addFields( [new TLabel('Nome do Pai')],  [$nomePai] );
            $this->form->addFields( [new TLabel('Nome da Mae')],  [$nomeMae] );
            $this->form->addFields( [new TLabel('Telefone')],  [$telefone] );
            $this->form->addFields( [new TLabel('Email', 'red')],  [$email] );
            
            $nome->addValidation('Name', new TRequiredValidator);
            $email->addValidation('Email', new TEmailValidator);
            
            // define the form actions
            $this->form->addAction( 'Save',  new TAction([$this, 'onSave']), 'fa:save green');
            $this->form->addActionLink( 'Clear', new TAction([$this, 'onClear']), 'fa:eraser red');
            
            // id not editable
            $id->setEditable(FALSE);
            
            $this->datagrid = new BootstrapDatagridWrapper(new TDataGrid);
            $this->datagrid->width = '100%';
            
            // add the columns
            $col_id    = new TDataGridColumn('id_pessoa', 'Id', 'right', '10%');
            $col_name  = new TDataGridColumn('nome', 'Nome', 'left', '40%');
            $col_cpf  = new TDataGridColumn('cpf', 'CPF', 'left', '15%');
            $col_dataNascimento  = new TDataGridColumn('data_nascimento', 'Data de Nascimento', 'left', '20%');
            $col_telefone  = new TDataGridColumn('telefone', 'Telefone', 'left', '15%');
            
            $this->datagrid->addColumn($col_id);
            $this->datagrid->addColumn($col_name);
            $this->datagrid->addColumn($col_cpf);
            $this->datagrid->addColumn($col_dataNascimento);
            $this->datagrid->addColumn($col_telefone);
            
            $col_id->setAction( new TAction([$this, 'onReload']),   ['order' => 'id']);
            $col_name->setAction( new TAction([$this, 'onReload']), ['order' => 'name']);
            $col_dataNascimento->setAction( new TAction([$this, 'onReload']), ['order' => 'data_nascimento']);
            
            $action1 = new TDataGridAction([$this, 'onEdit'],   ['key' => '{id_pessoa}'] );
            $action2 = new TDataGridAction([$this, 'onDelete'], ['key' => '{id_pessoa}'] );
            
            $this->datagrid->addAction($action1, 'Edit',   'far:edit blue');
            $this->datagrid->addAction($action2, 'Delete', 'far:trash-alt red');
            
            // create the datagrid model
            $this->datagrid->createModel();
            
            // wrap objects
            $vbox = new TVBox;
            $vbox->style = 'width: 100%';
            $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
            $vbox->add($this->form);
            $vbox->add(TPanelGroup::pack('', $this->datagrid));
            
            // add the box in the page
            parent::add($vbox);
        }
        
        /**
         * method onReload()
         * Load the datagrid with the database objects
         */
        function onReload($param = NULL)
        {
            try
            {
                // open a transaction with database 'samples'
                TTransaction::open('dbprogweb_t2');
                
                $order    = isset($param['order']) ? $param['order'] : 'id_pessoa';
                // load the objects according to criteria
                $people = Pessoa::orderBy($order)->load();
                
                $this->datagrid->clear();
                if ($people)
                {
                    // iterate the collection of active records
                    foreach ($people as $person)
                    {
                        // add the object inside the datagrid
                        $this->datagrid->addItem($person);
                    }
                }
                // close the transaction
                TTransaction::close();
                $this->loaded = true;
            }
            catch (Exception $e) // in case of exception
            {
                // shows the exception error message
                new TMessage('error', $e->getMessage());
                
                // undo all pending operations
                TTransaction::rollback();
            }
        }
        
        /**
         * method onSave()
         * Executed whenever the user clicks at the save button
         */
        function onSave()
        {
            try
            {
                // open a transaction with database 'samples'
                TTransaction::open('dbprogweb_t2');
                
                $this->form->validate(); // run form validation
                
                // get the form data into an active record person
                $person = $this->form->getData('Pessoa');
                
                // stores the object
                $person->store();
                
                // close the transaction
                TTransaction::close();
                
                // shows the success message
                new TMessage('info', 'Record saved');
                
                // reload the listing
                $this->onReload();
            }
            catch (Exception $e) // in case of exception
            {
                // shows the exception error message
                new TMessage('error', $e->getMessage());
                
                // undo all pending operations
                TTransaction::rollback();
            }
        }
        
        /**
         * Clear form
         */
        public function onClear()
        {
            $this->form->clear( true );
        }
        
        /**
         * method onEdit()
         * Executed whenever the user clicks at the edit button
         */
        function onEdit($param)
        {
            try
            {
                if (isset($param['id_pessoa']))
                {
                    // get the parameter e exibe mensagem
                    $key = $param['id_pessoa'];
                    
                    // open a transaction with database 'samples'
                    TTransaction::open('dbprogweb_t2');
                    
                    // instantiates object person
                    $person = new Pessoa($key);
                    
                    // lança os data do person no form
                    $this->form->setData($person);
                    
                    // close the transaction
                    TTransaction::close();
                    $this->onReload();
                }
                else
                {
                    $this->form->clear( true );
                }
            }
            catch (Exception $e) // in case of exception
            {
                // shows the exception error message
                new TMessage('error', $e->getMessage());
                
                // undo all pending operations
                TTransaction::rollback();
            }
        }
        
        /**
         * method onDelete()
         * executed whenever the user clicks at the delete button
         * Ask if the user really wants to delete the record
         */
        public static function onDelete($param)
        {
            // define the delete action
            $action = new TAction([__CLASS__, 'Delete']);
            $action->setParameters($param); // pass the key parameter ahead
            
            // shows a dialog to the user
            new TQuestion('Do you really want to delete ?', $action);
        }
        
        /**
         * method Delete()
         * Delete a record
         */
        public static function Delete($param)
        {
            try
            {
                // get the parameter $key
                $key = $param['id_pessoa'];
                
                // open a transaction with database 'samples'
                TTransaction::open('dbprogweb_t2');
                
                // instantiates object person
                $person = new Pessoa($key);
                
                // deletes the object from the database
                $person->delete();
                
                // close the transaction
                TTransaction::close();
                
                $pos_action = new TAction([__CLASS__, 'onReload']);
                new TMessage('info', AdiantiCoreTranslator::translate('Record deleted'), $pos_action);
            }
            catch (Exception $e) // in case of exception
            {
                // shows the exception error message
                new TMessage('error', $e->getMessage());
                
                // undo all pending operations
                TTransaction::rollback();
            }
        }
        
        /**
         * method show()
         * Shows the page e seu conteúdo
         */
        function show()
        {
            // check if the datagrid is already loaded
            if (!$this->loaded)
            {
                $this->onReload( func_get_arg(0) );
            }
            parent::show();
        }
    }

