@extends('layouts.admin_central')
@section('content')
    <h3>Central</h3>
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>Dia da avaliação</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>                
                </tbody>
            </table>
        </div>
    </div>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>



@endsection()