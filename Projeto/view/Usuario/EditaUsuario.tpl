                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Perfil
                        </h1>
                    </div>
                    <div id="perfil" class="row">
                        <div class="col-lg-6">

                            <form role="form" action="EditaPerfilUsuario" id="formEditaPerfilUsuario">
                                <div class="form-group">
                                    <label>Usuario</label>
                                    <input type="text" class="form-control" name="nome" value="[@usuario]">
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" class="form-control" name="email" value="[@email]">
                                </div>
                                <div class="form-group">
                                    <label>Senha Atual</label>
                                    <input type="password" class="form-control" name="senhaAtual">
                                </div>
                                <div class="form-group">
                                    <label>Senha Nova</label>
                                    <input type="password" class="form-control" name="senhaNova">
                                </div>
                                <input type="hidden" name="id" value="[@id]">
                                <button type="submit" class="btn btn-primary"> Editar </button>
                                <a class="btn btn-danger" id="deletarPessoa"> Deletar </a>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- /.row -->