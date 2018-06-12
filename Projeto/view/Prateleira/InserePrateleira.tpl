            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Produtos
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="FormProdPrat" id="formAddPrateleira">
                            <div class="form-group">
                                <select id="produtosList" class="form-control">
                                    [@produtos]
                                </select>
                            </div>
                            <div class="form-group">
                                <ul class="list-group">
                                    [@conteudo]
                                </ul>
                            </div>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                            <a class="btn btn-primary" href="?acao=ConsultaMapa">Voltar</a>
                            <a class="btn btn-primary" id="editarPrateleira">Editar</a>
                            <a class="btn btn-danger" id="deletarPrateleira">Deletar</a>
                        </form>
                    </div>
                </div>
            </div>
