<template>
    <form @submit.prevent="addTodo">
        <div class="row">
            <div class="form-group col-md-10">
                <input type="text" class="form-control form-control-lg" placeholder="Add todo..." v-model="content">
            </div>
            <div class="form-group col-md-2">
                <button class="btn btn-primary btn-lg">Add</button>
            </div>
        </div>
    </form>
</template>

<script>
export default {
    data() {
        return {
            content: '',
        };
    },
    methods: {
        addTodo() {
            const req = {
                content: this.content
            };
            axios.post(`api/todos`, req)
                .then(response => {
                    this.content = '';
                    this.$emit('todoAdded', response.data.data);
                })
        }
    }
}
</script>