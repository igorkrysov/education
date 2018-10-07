@extends('layouts.app')

@section('content')

<dictionary-component></dictionary-component>
<div class="container">
    <div class="row">
        <div class="col-12">
        <center><h1>Добавление словаря</h1></center>
        <p>
        <form method="post" action="{{ route('dictionary.store') }}">
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token()}}">
            <table class="table table-bordered" >
                <tr>
                    <td><center><b>Название</b></center></td>
                    <td><center><b>Действие</b></center></td>
                </tr>
                <tr>

                    <td><input type='text' class="form-control" name="title"  id='title'></td>
                    <td><input type="submit" class="btn btn-default" id='add' value="Добавить"></td>

                </tr>
            </table>
        </form>
        <p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <center><h1>Список словарей</h1></center>
            <table class="table table-bordered">
                <tr>
                    <td style=''><center><b>Название словаря</b></center></td>
                    <td style=''><center><b>Действие</b></center></td>
                    <td style=''><center><b>Перейти к словарю</b></center></td>
                </tr>
                
                @forelse ($dictionaries as $dictionary)
                    <tr id="dictionary-{{$dictionary->id}}">
                        <td>
                            <a href="#" name="title" id="title" data-type="text" class="dictionary-edit" data-pk="{{$dictionary->id}}" data-url="edit_vocabulary" data-title="Enter">{{$dictionary->title}}</a>
                        </td>

                        <td>
                            <form action="{{ route('dictionary.destroy', $dictionary->id) }}" method="post">
                                @method('delete')
                                @csrf()
                                <button class="bnt-vocabulary-del">-</button>
                            </form>
                        </td>
                        <td><a href="{{ route('dictionary.show', $dictionary->id) }}">Перейти</a></td>
                  </tr>
                @empty
                @endforelse
            </table>
        </div>
    </div>
    
</div>
@endsection

@push('scripts')
    <script src="/js/vocabulary.js"></script>
@endpush;