@extends('layouts.admin')
@section('content')
<div style="margin-top: 12%; margin-bottom: 12%" align="center">
    <h3>{{ $exception->getMessage() }}</h3>
</div>
@endsection