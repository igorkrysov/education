<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Add dictionary</h1>
                <input type="text" v-model="newDictionary">
                <button @click="addDictionary" >Add</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <tr>
                        <th>Title</th>
                        <th>Action</th>
                        <th>Go</th>
                    </tr>
                    <tr v-for="dictionary in dictionaries">
                        <td>
                            <span v-if="!edit" @dblclick="updateDictionary(dictionary)"> {{ dictionary.title }}</span>
                            <input v-if="edit" @dblclick="updateDictionary(dictionary)" type="text" v-model="dictionary.title">
                        </td>
                        <td><button @click="deleteDictionary(dictionary)">-</button></td>
                        <td><a :href="'/dictionary/' + dictionary.id">Go</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'dictionaries_'
        ],
        data() {
            return {
                newDictionary: '',
                edit: false,
                dictionaries: []
            }
        },
        mounted() {
            this.dictionaries = this.dictionaries_;
            console.log(this.dictionaries[0]);
        },
        methods: {
            addDictionary() {
                console.log('ddddd');
                axios.post('dictionary', {
                        title: this.newDictionary
                    })
                    .then(response => {
                        this.info = response;                        
                        this.dictionaries.push(response.data);
                        this.newDictionary = "";
                    });
            },
            deleteDictionary(dictionary) {
                console.log(dictionary)
                console.log(this.dictionaries.indexOf(dictionary))
                axios.delete('dictionary/' + dictionary.id)
                    .then(response => {
                        this.info = response;     
                        console.log(this.dictionaries.indexOf(dictionary))                   
                        this.dictionaries.splice(this.dictionaries.indexOf(dictionary),1);
                        this.newDictionary = "";
                    });
            },
            updateDictionary(dictionary) {
                if(this.edit) {
                    //save
                    axios.put('/dictionary/' + dictionary.id, {
                        'title': dictionary.title,                       
                    })
                    .then(response => {
                        this.info = response;                      
                    });
                }
                this.edit = !this.edit;
            }
        }
    }
</script>
