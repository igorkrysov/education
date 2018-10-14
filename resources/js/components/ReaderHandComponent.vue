<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-3">
                        <button v-on:click="index > 0 ? index-- : 0" type="button">prev</button>
                    </div>

                    <div class="col-3">
                        <button v-on:click="index <  readerA.length - 1 ? index++ : readerA.length - 1" type="button">next</button>
                    </div>
                    <div class="col-6">
                        {{ index + 1 }} / {{ readerA.length }}
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-12">
                        <form action="#">
                            <label for="size">Size font:</label>
                            <input type="text" id="size" v-model="fontSize" readonly>
                            <button v-on:click="fontSize++" type="button">+</button>
                            <button v-on:click="fontSize--" type="button">-</button>
                        </form>
                    </div>
                </div>
                <div class="row" v-if="index == 0">
                    <div class="col-12 title">{{ reader.title }}</div>
                    
                </div>
                <div class="row content">
                    <div class="col-9" v-bind:style="{fontSize: fontSize + 'px'}">{{ readerA[index] }}</div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button v-on:click="index > 0 ? index-- : 0" type="button">prev</button>
                    </div>

                    <div class="col-3">
                        <button v-on:click="index <  readerA.length - 1 ? index++ : readerA.length - 1" type="button">next</button>
                    </div>
                    <div class="col-6">
                        {{ index + 1 }} / {{ readerA.length }}
                    </div>
                </div>
                <div class="row" v-if="questions">
                    <div class="col-12 questions" v-html="reader.questions"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'reader',
        ],
        mounted() {
            console.log('Component mounted.');
            
            this.reader.text = this.reader.text.replace(/[\.\?\!]{1}/g, '$&^');
            this.readerA = this.reader.text.split('^'); 
            if( this.reader.questions !== null) {                
                this.reader.questions = this.reader.questions.replace(/\n/g, '<br>');
            }
            this.update();
        },
        data() {
            return {
                count: 0,
                lastPosition: 0,
                text: '',
                fontSize: 15,
                index: 0,
                readerA: [],
                delay: 0,
                start: false,
                questions: false
            }
        },
        methods: {
            update: function() {
                console.log(this.reader);
            },
            
        }
    }
</script>
<style lang="scss">
    #speed {
        width: 50px;        
    }
    
    .title {
        margin-bottom: 12px;;
    }
    .questions {
        margin-top: 200px;
    }
    .content {
        min-height: 250px;
    }
</style>
