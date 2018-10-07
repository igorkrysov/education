<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Add word</h1>
                <input type="text" v-model="newWord">
                <input type="text" v-model="newTranslate">
                <button @click="add" >Add</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <tr>
                        <th>Word</th>
                        <th>Translate</th>
                        <th>Action</th>
                    </tr>
                    <tr v-for="word in words">
                        <td>
                            <span v-if="!editWord" @dblclick="updateWord(word)"> {{ word.word }}</span>
                            <input v-if="editWord" @dblclick="updateWord(word)" type="text" v-model="word.word">
                        </td>
                        <td>
                            <span v-if="!editWord" @dblclick="updateWord(word)"> {{ word.translate }}</span>
                            <input v-if="editWord" @dblclick="updateWord(word)" type="text" v-model="word.translate">
                        </td>
                        <td><button @click="deleteWord(word)">-</button></td>                        
                    </tr>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'words_',
            'dictionary_id'
        ],
        data() {
            return {
                newWord: '',
                newTranslate: '',
                editWord: false,
                words: []
            }
        },
        mounted() {
            // console.log(this.words[0].word);
            this.words = this.words_;
        },
        methods: {
            add() {                
                axios.post('/word', {
                        word: this.newWord,
                        translate: this.newTranslate,
                        dictionary_id: this.dictionary_id
                    })
                    .then(response => {
                        this.info = response;                        
                        this.words.push(response.data);
                        this.newWord = "";
                        this.newTranslate = "";
                    });
            },
            deleteWord(word) {
                axios.delete('/word/' + word.id)
                    .then(response => {
                        this.info = response;
                        console.log(this.words.indexOf(word))
                        this.words.splice(this.words.indexOf(word),1);                        
                        console.log(this.words);
                    });
            },
            updateWord(word) {
                if(this.editWord) {
                    //save
                    axios.put('/word/' + word.id, {
                        'word': word.word,
                        'translate': word.translate
                    })
                    .then(response => {
                        this.info = response;                      
                    });
                }
                this.editWord = !this.editWord;                
            }
        }
    }
</script>
