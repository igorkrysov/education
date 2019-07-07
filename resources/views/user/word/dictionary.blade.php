@extends('layouts.app')

@section('content')
<div class="container" id="app2">
    <div class="row">
        <div class="col-12">
            <h1>List of dictionaries</h1>
            <table>
                <tr>
                    <th>#</th>
                    <th>selected</th>
                    <th>word-translate</th>
                    <th>translate-word</th>           
                    <th>to repeat</th>
                </tr>
                
                    <tr v-for="(word, index)  in words" v-bind:class="{ 'table-warning': checkboxes[index] !== undefined }">
                        <td>@{{ index + 1 }}</td>
                        <td><input type="checkbox" v-model="checkboxes[index]"></td>
                        <td>@{{ word.word }}</td>
                        <td>@{{ word.translate }}</td>
                        <td><a href="/user/word-repeat/{word.id}">to repeat</a></td>
                    </tr>
                
            </table>
        </div>
    </div>
</div>


@endsection

@push('scripts')
<script src="{{ asset('js/app.js') }}"></script>
<script>
    var app = new Vue({
        el: "#app2",
        data: {
            checkboxes: [],
            dictionary: {!! $dictionary !!},
            words: {!! $dictionary->words !!}
        },
        mounted() {
            console.log("test");
            console.log(this.words);
        }
    });
</script>
@endpush