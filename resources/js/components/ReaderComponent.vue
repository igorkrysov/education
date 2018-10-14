<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-6">
                        <form action="#">
                            <button v-on:click="start = !start" type="button">{{ start ? 'pause' : 'start'}}</button>
                        </form>
                    </div>
                    <div class="col-6">
                        {{ index + 1 }} / {{ readerA.length }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form action="#">
                            <label for="speed">Delay per 100 symbols:</label>
                            <input type="text" id="speed" v-model="speed" readonly>
                            <button v-on:click="speed += 0.5" type="button">+</button>
                            <button v-on:click="speed == 0.5 ? speed = 0.5 : speed -= 0.5" type="button">-</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form action="#">
                            <label for="size">Size:</label>
                            <input type="text" id="size" v-model="size" readonly>
                            <button v-on:click="size += 10" type="button">+</button>
                            <button v-on:click="size == 100 ? size = 100 : size -= 10" type="button">-</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 title">{{ reader.title }}</div>
                    
                </div>
                <div class="row">
                    <div class="col-12">{{ readerA[index] }}</div>
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
            this.timer_loop();
        },
        data() {
            return {
                count: 0,
                lastPosition: 0,
                text: '',
                speed: 2,
                size: 1,
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
            timer_loop: function() {
                console.log(this.speed);
                if(this.start) {
                    if(this.readerA.length - 1 > this.index) {
                        this.index++;
                    }
                    if(this.readerA[this.index].length > 10) {
                        this.delay = this.speed * 10  * this.readerA[this.index].length
                    } else {
                        this.delay = this.speed * 700 ;
                    }
                    if(this.readerA.length - 1 == this.index) {
                        this.questions = true;
                    }
                } else {
                    this.delay = 1000;
                }
                // if(this.reader.text.length - 1 > (this.lastPosition + this.size)) {
                //     this.text = this.reader.text.substr(this.lastPosition, this.size);
                //     this.lastPosition += this.size;
                // } else {
                //     this.text = this.reader.text.substr(this.lastPosition, this.reader.text.length - this.lastPosition);
                //     this.lastPosition += this.reader.text.length - this.lastPosition;
                // }
                // console.log(this.lastPosition);
                
                setTimeout(this.timer_loop, this.delay);
            }
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
</style>
