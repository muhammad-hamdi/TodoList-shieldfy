<template>
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h1>Add Todo</h1>
        </div>
        <div class="card-body">
            <form-component @todoAdded="addTodo($event)"></form-component>
            <hr>
            <div class="list-group">
                <task v-for="todo in todos" :key="todo.id" :todo="todo"></task>
            </div>
            <paginator :meta="meta"></paginator>
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
        getTodos(url = `api/todos`) {
            axios.get(url)
                .then(response => {
                    this.todos = response.data.data;
                    this.meta = response.data.meta
                })
        },
        addTodo(todo) {
            this.todos.unshift(todo);
        }
    },
    components: {
        FormComponent,
        Task,
        Paginator
    }
}
</script>