<template>
    <div class="addItem">
        <input type="text" v-model="item.name"/>
        <font-awesome-icon
            icon="plus-square"
            @click="addItem()"
            :class="[ item.name ? 'active' : 'inactive', 'plus']"
        />
    </div>
</template>

<script>
    export default {
        data: function(){
            return {
                item:{
                    name: ""
                }
            }
        },
        methods: {
            addItem(){
                if(this.item.name === ''){
                    return;
                }
                if(this.item.name.length <= 2){
                    alert('Must be more than 2 symbols, if u want adding new task!')
                }else{
                    axios.post('api/item/store',{
                        name: this.item.name

                    })
                        .then(response => {
                            if(response.status === 201){
                                this.item.name = "";
                                this.$emit('reloadlist')
                            }
                        })
                        .catch( error => {
                            console.log( error );
                        })
                }
            }
        }
    }
</script>

<style scoped>
    .addItem {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    input {
        background: #f7f7f7;
        border: 0;
        outline: none;
        padding: 5px;
        margin-right: 10px;
        width: 100%;
    }

    .plus {
        font-size: 20px;
    }

    .active {
        color: #19692c;
    }

    .inactive {
        color: #0f6674;
    }
</style>
