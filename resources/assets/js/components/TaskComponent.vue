<template>
    <div class="list-group-item list-group-item-action">
        {{ todo.content }}
        <a href="javascript:void(0)" @click="removeTodo(todo)" class="position-absolute" style="top: 10px;right: 10px;"><i class="fa fa-trash fa-2x"></i></a>
    </div>
</template>

<script>
export default {
    props: ['todo'],
    methods: {
        removeTodo(todo) {
            this.$emit('remove', todo);
        }
    }
}
</script>