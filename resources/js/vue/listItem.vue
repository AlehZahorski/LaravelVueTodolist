<template>
    <div class="item">
        <input
            type="checkbox"
            @change="updateCheck()"
            v-model="item.completed"
        />
        <span :class=" [item.completed ? 'completed' : '', 'itemText'] "> {{ item.name }} </span>
        <button @click="removeItem()" class="trashCan">
            <font-awesome-icon icon="trash" />
        </button>
    </div>
</template>


<script>
    export default {
        props: ['item'],
        methods: {
            updateCheck() {
                axios.put('api/item/' + this.item.id, {
                    completed: this.item.completed
                })
                    .then( response => {
                        if( response.status === 200){
                            this.$emit('itemchanged');
                        }
                    })
                    .catch( error => {
                        console.log( error )
                    })
            },
            removeItem() {
                axios.delete('api/item/' + this.item.id)
                .then( response => {
                    if(response.status === 200){
                        this.$emit('itemchanged');
                    }
                })
                .catch( error => {
                    console.log( error );
                })
            }
        }
    }
</script>

<style>
    .completed {
        text-decoration: line-through;
        color: #888a85;
    }

    .itemText {
        width: 100%;
        margin-left: 20px;
    }

    .item {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .trashCan {
        background: #e6e6e6;
        border: none;
        color: #bd2130;
        outline: none;
    }
</style>
