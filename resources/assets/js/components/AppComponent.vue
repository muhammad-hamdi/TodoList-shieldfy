<template>
    <div class="container">
        <div class="col-md-8 mx-auto">
            <todo-component></todo-component>
        </div>
    </div>
</template>

<script>
import TodoComponent from './TodoContainerComponent.vue';
export default {
    components: {
        TodoComponent
    }
}
</script>
