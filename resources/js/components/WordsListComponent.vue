<template>
    <div class="container">
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
                    
                        <tr v-for="(word, index)  in words" v-bind:class="{ 'table-warning': checkboxes[index] }">
                            <td>{{ index + 1 }}</td>
                            <td><input type="checkbox" v-model="checkboxes[index]"></td>
                            <td>{{ word.word }}</td>
                            <td>{{ word.translate }}</td>
                            <td><a href="/user/word-repeat/{word.id}">to repeat</a></td>
                        </tr>
                    
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'dictionary'
        ],
        data() {
            return {
                checkboxes: [],
                words: []
            }
        },
        mounted() {
            this.getWords();
        },
        methods: {
           getWords() {
               axios.get('/user/dictionary/' + this.dictionary)
                    .then(response => {
                        if (response.data.status == true) {
                            this.words = response.data.words;
                        }
                    })
                    .catch(err => {
                        console.log(err);
                    })
           }
            
        }
    }
</script>
