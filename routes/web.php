<?php
//use App\Mail\InscricaoConcluido;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;

Route::get('/', 'inicioController@index');

Route::post('/validaCpf', 'respFinController@validaCpf')->name('validaCpf');
Route::post('/loginIrmaos', 'respFinController@loginIrmaos')->name('loginIrmaos');
Route::get('/lista_de_espera/{token}','candidatoController@listaDeEspera')->name('espera.token');
Route::group(['prefix'=>'/inscricao'], function (){
    Route::get('/{cpf}/respfin','respFinController@index');
    Route::post('/{cpf}/savefin','respFinController@save');

    Route::get('/{cpf}/respacad','respAcadController@index');
    Route::post('/{cpf}/saveacad','respAcadController@save');

    Route::get('/{cpf}/candidato','candidatoController@index');
    Route::post('/{cpf}/savecandidato','respAcadController@save');

    Route::get('/candidato/falta_documento/{cpf}/{id}','candidatoController@faltaDocumento');
    Route::post('/candidato/falta_documento/{cpf}/{id}','candidatoController@documentosFaltantes')->name('documentosfaltantes');
    Route::get('/candidato/prova/{cpf}/{id}','candidatoController@diaProva');
    Route::get('/candidato/infos/{cpf}/{insc}','candidatoController@gerarPdf');
    Route::post('/candidato/inscricao','inscricaoController@inscrever')->name('inscrever');
    Route::get('/candidato/idade/{id}','candidatoController@selectFxEtaria');
    Route::post('/candidato/save/{cpf}','candidatoController@save');
    Route::get('/candidato/{esc}/ano','candidatoController@selectAno');
    Route::get('/candidato/{esc}/{ano}','candidatoController@selectTurno');
    Route::get('/concluido/{id}','inscricaoController@concluido');
});
Route::get('/painel/{cpf}','respFinController@painel');



Route::group(['prefix'=>'/home'], function (){
    if(env('APP') != 'production'){
        Auth::loginUsingId(1);
    }
    Route::get('avaliacao','avaliacaoController@index')->name('avIndex');
    Route::post('avaliacao','avaliacaoController@save');
    Route::get('avaliacao/delete/{id}','avaliacaoController@destroy');
    Route::get('pagamento/','tesourariaController@pgIndex')->name('pagamento');
    Route::post('pagamento/','tesourariaController@pgSearch');
    Route::get('pagamento/{insc}','tesourariaController@pgConfirma');
    Route::get('pagamento/cancelar/{insc}','tesourariaController@pgCancela');
    Route::get('procurar','HomeController@searchIndex');
    Route::post('procurar','HomeController@search');
    Route::get('secretaria/','secretariaController@secretaria');
    Route::get('secretaria/avaliacaodata','secretariaController@alterarDataIndex');
    Route::post('secretaria/avaliacaodata','secretariaController@alterarDataProcurar');
    Route::post('secretaria/avaliacaodata/salvar','secretariaController@alterarDataSave')->name('alterarDataSave');
    Route::get('secretaria/presenca/{id}','secretariaController@lstPresenca')->name('lstPresenca');
    Route::get('secretaria/etiqueta/{id}','secretariaController@etiqueta')->name('etiqueta');
    Route::get('secretaria/etiqueta-kit/{id}','secretariaController@etiquetaKit')->name('etiqueta-kit');
    Route::get('secretaria/etiqueta-pulseira/{id}','secretariaController@etiquetaPulseira')->name('etiqueta-pulseira');
    //Central
    Route::get('central','centralController@index');
    Route::get('central/nao_matriculados','centralController@pagNaoMatriculado');
    Route::post('central/add_historico','centralController@addHistorico')->name('add_historico');
    Route::get('central/espera','centralController@espera');
    Route::get('central/espera/{id}','centralController@esperaRemove');
    Route::get('central/pagamento','centralController@naoPagos');
    Route::get('central/pagamento/{id}','centralController@removeInsc');    
    Route::get('central/matricula','matriculaController@index');
    Route::post('central/matricula','matriculaController@store');
    Route::get('central/matricula/{id}','matriculaController@create');
    Route::get('central/emailInteresse','emailController@cad_interesse');
    Route::post('central/emailInteresse','emailController@cad_interesse_send');
    Route::get('config','configController@index');
});
Route::get('/login','Auth\googleController@redirectToProvider')->name('login');
Route::get('/login/google/callback','Auth\googleController@handleProviderCallback');
Route::get('/logoff','Auth\googleController@logoff');
Route::get('/home','HomeController@index')->name('home');



//Auth::routes();


