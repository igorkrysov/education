<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <button @click="getPic()">Get</button>
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
                <img v-if="hide == false" src="http://lorempixel.com/400/200/" alt="">
                
            </div>
        </div>
       
    </div>
</template>

<script>
    export default {
        data() {
            return {
               hide: false
            }
        },
        mounted() {
            
        },
        methods: {
            getPic() {
                this.hide = !this.hide;

            },
            
        }
    }
</script>
