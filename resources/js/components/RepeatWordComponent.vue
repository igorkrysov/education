<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <input type="text" v-model="countInPack">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
               {{ countAll }}:{{ countRepeat }}:{{ words.length }}<br>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                {{ this.currentWord.word.word  }}
            </div>
        </div>
        <div v-if="answer" class="row">
            <div class="col-12">
                {{ this.currentWord.word.translate ? this.currentWord.word.translate  : ''}}
            </div>
        </div>
        <div class="row">
            <div class="col-12">
              <button @click="know()">I know</button>
              <button @click="notknow()">I don't know</button>
            </div>
        </div>        
    </div>
</template>

<script>
    export default {
        props: [
            'dictionary_id',
            'type'
        ],
        data() {
            return {
                countAll: 0,
                countRepeat: 0,
                countInPack: 10,
                answer: false,
                words: [],
                currentWord:{
                    word: '',
                    translate: ''
                }
            }
        },
        mounted() {
            this.getWords();
        },
        methods: {
            getWords() {
                axios.get('/user/repeat/words/' + this.countInPack)
                    .then(response => {
                        this.info = response;
                        console.log(response.data.words);
                        this.words = this.words.concat(response.data.words);
                        this.countAll = response.data.countAll;
                        this.countRepeat = response.data.countRepeat;
                        if(this.countAll > 0) {
                            this.getWord();
                        }
                        console.log('getWords');
                    });
            },
            getWord() {
                console.log()
                this.currentWord = this.words[Math.floor(Math.random() * (this.words.length -1 ))];
                // console.log("cur W B");
                // console.log(this.currentWord.word.word);
                // console.log("cur W E");
                if(this.words.length == 0) {
                    this.getWords();
                }
            },
            know() {
                if(!this.answer) {
                    this.answer = true;                    
                } else {
                    this.answer = false;
                    axios.get('/user/repeat/word-update/' + this.currentWord.word.id)
                    .then(response => {
                        this.countAll = response.data.countAll;
                        this.words.splice(this.words.indexOf(this.currentWord), 1);
                        this.getWord();    
                    });
                    
                }
            },
            notknow() {
                if(!this.answer) {
                    this.answer = true;                    
                } else {
                    this.answer = false;
                    this.getWord();
                }
            }
        }
    }
</script>
