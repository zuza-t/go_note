<template>
    <div class="h-100">
        <div class="text-end">
            <button v-on:click="onRemove()" type="button" class="btn btn-outline-danger">
                <i class="bi-trash-fill"></i>
            </button>
        </div>
        <div class="my-2 p-2 bg-secondary text-center text-white">
            <i class="bi-sticky"></i> {{note.name}}
        </div>
        <div class="p-5 border border-1 rounded-0 text-center h-75 overflow-auto">{{note.content}}</div>
    </div>
</template>

<script>
export default {
    props: ['note'],
    data: function () {
      return {}
    },
    methods: {
        onRemove: function (){
          this.$emit('note-remove', this.note);
        },
    }
}
</script>