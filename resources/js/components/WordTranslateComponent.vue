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
                <div v-if="type == 'wt'">
                    {{ currentWord ? currentWord.word : '' }}
                </div>
                <div v-if="type == 'tw'">
                    {{ currentWord ? currentWord.translate : '' }}
                </div>               
            </div>
        </div>
        <div  class="row" style="height: 20px;">
            <div v-if="answer" class="col-12">
              <div v-if="type == 'wt'">
                    {{ currentWord ? currentWord.translate : '' }}
                </div>
                <div v-if="type == 'tw'">
                    {{ currentWord ? currentWord.word : ''}}
                </div>    
            </div>
        </div>
        <div class="row">
            <div class="col-12">
              <br>
              <button @click="know()">I know</button>
              <button @click="notknow()">I don't know</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p><hr></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
              <button @click="toRepeat()">Send to repeat</button>              
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
                axios.get('/user/words/' + this.type + '/' + this.countInPack + '/' + this.dictionary_id)
                    .then(response => {
                        this.info = response;
                        
                        this.words = this.words.concat(response.data.words);
                        this.countAll = response.data.countAll;
                        this.countRepeat = response.data.countRepeat;
                        if(this.countRepeat > 0) {
                            this.getWord();
                        }
                    });
            },
            getWord() {
                this.currentWord = this.words[Math.floor(Math.random() * (this.words.length -1 ))];
                console.log(this.currentWord);
                console.log(this.words);
                if(this.words.length == 0) {
                    this.getWords();
                }
            },
            know() {
                if(!this.answer) {
                    this.answer = true;                    
                } else {
                    this.answer = false;
                    axios.get('/user/word-update/' + this.type + '/' + this.currentWord.id)
                    .then(response => {
                        this.countRepeat = response.data;
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
            },
            toRepeat() {
                axios.get('/user/word-repeat/' + this.currentWord.id)
                    .then(response => {
                        this.countRepeat = response.data;
                        this.words.splice(this.words.indexOf(this.currentWord), 1);
                        this.answer = false;
                        this.getWord();    
                    });
            }
            
        }
    }
</script>
