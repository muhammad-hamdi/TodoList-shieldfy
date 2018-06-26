<template>
    <div class="card mb-5">
        <div class="card-header bg-primary text-white">
            <h1>Add Todo</h1>
        </div>
        <div class="card-body">
            <form-component @todoAdded="addTodo($event)"></form-component>
            <hr>
            <div class="list-group">
                <task v-for="todo in todos" :key="todo.id" :todo="todo" @remove="removeTodo($event)"></task>
            </div>
            <hr>
            <div class="col-md-12">
                <paginator :meta="meta" @navigate="navigate($event)"></paginator>
            </div>
        </div>
    </div>
</template>

<script>
    import FormComponent from './FormComponent.vue';
    import Task from './TaskComponent.vue';
    import Paginator from './PaginationComponent.vue';

    export default {
        data() {
            return {
                todos: [],
                meta: {}
            };
        },
        created() {
            this.getTodos();
        },
        methods: {
            getTodos(page = 1) {
                axios.get(`api/todos`, {
                    params: {
                        page
                    }
                }).then(response => {
                    this.todos = response.data.data;
                    this.meta = Object.assign(response.data.meta, response.data.links);
                })
            },
            navigate(page) {
                this.getTodos(page);
            },
            addTodo(todo) {
                this.todos.unshift(todo);
            },
            removeTodo(todo) {
                this.warningAlert().then((result) => {
                    if (result.value) {
                        axios.delete(`api/todos/${todo.id}`)
                            .then(() => {
                                this.getTodos();
                                this.successAlert('deleted.');
                        });
                    }
                })
            },
            warningAlert() {
                return this.$swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                })
            },
            successAlert(event) {
                return this.$swal(
                    event,
                    `Your item has been ${event}`,
                    'success'
                )
            }
        },
        components: {
            FormComponent,
            Task,
            Paginator
        }
    }
</script>