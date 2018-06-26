<template>
    <div class="container">
        <div class="col-md-8 mx-auto">
            <todo-component></todo-component>
        </div>
    </div>
</template>

<script>
import TodoComponent from './TodoComponent.vue';
export default {
    components: {
        TodoComponent
    }
}
</script>
