@extends('layouts.admin_secretaria')
@section('content')

    <h3>Datas das avaliações</h3>
    <form action="" method="post">
        @csrf

            <div class="row">
                <div class="col-sm-3">
                    <label for="">Datas para inscrição</label>
                    <input type="date" name="dtlimite_insc" class="form-control" autofocus>
                </div>
                <div class="col-sm-3">
                    <label for="">Data da prova</label>
                    <input type="date" name="dtprova" class="form-control">
                </div>
                <div class="col-sm-3">
                    <br>
                    <button type="submit" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
                </div>
            </div>

    </form>

        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>Data Limite</th>
                    <th>Dia da Prova</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($a as $d)
                <tr>
                    <td>{{date("d/m/Y", strtotime($d->DTLIMITE_INSC))}}</td>
                    <td>{{date("d/m/Y", strtotime($d->DTPROVA))}}</td>
                    <td><a href="#" data-toggle="modal" data-target="#{{$d->id}}"><span class="glyphicon glyphicon-remove"></span></a></td>

                </tr>
                <div id="{{$d->id}}" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                  
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Perigo!</h4>
                        </div>
                        <div class="modal-body">
                            <p>Deseja realmente excluir essa avaliação?</p>
                            <div class="alert alert-warning">
                                    <strong>Aviso!</strong> Essa ação não pode ser desfeita!
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{url('home/avaliacao/delete').'/'.$d->id}}" class="btn btn-danger">Sim</a>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        </div>
                      </div>
                  
                    </div>
                  </div>
                
                @endforeach
                </tbody>
            </table>
        </div>

@endsection()