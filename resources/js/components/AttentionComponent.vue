<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <button @click="generateText()">Generate</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
               {{ search }}
            </div>
            <div class="col-md-6">
               {{ countSign }}
            </div>            

        </div>
        <div class="row">
            <div class="col-md-6">
                <span v-for="symbol in text" v-bind:class="{'text-danger font-weight-bold' : symbol.toUpperCase() == search.toUpperCase() && color}">{{ symbol }} </span>
                
            </div>
        </div>
        <div class="row">
            <div class="col-12">
              <button @click="toColor()">to color</button>              
            </div>
        </div>
       
    </div>
</template>

<script>
    export default {
        data() {
            return {
               countSign: 0,
               text: [],
               search: '',
               clearText: '',
               color: false
            }
        },
        mounted() {
            
        },
        methods: {
            generateText() {
                this.color = false;
                this.text = [];
                for(var i = 0; i < 100; i++) {
                    var symbol = this.randomSign();
                    this.text.push(symbol);
                    
                }

                this.search = this.randomSign();
                var count = 0;
                for(var i = 0; i < this.text.length; ++i){
                    if(this.text[i].toUpperCase() == this.search.toUpperCase())
                        count++;
                }
                this.countSign = count;
            },
            randomSign() {
                var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789 ";

                return possible.charAt(Math.floor(Math.random() * possible.length));
            },
            toColor() {
                this.color = true;
            }
        }
    }
</script>
