<template>
    <form v-on:submit.prevent="onSubmit()">
        <div class="form-group my-2">
            <label for="formName">Nazwa</label>
            <input v-model="name" type="text" class="form-control rounded-0" id="formName" placeholder="...">
        </div>
        <div class="form-group my-2">
            <label for="formContent">Zawartość</label>
            <textarea v-model="content" type="text" class="form-control rounded-0" rows="10" id="formContent" placeholder="..."></textarea>
        </div>
        <button type="submit" class="btn btn-secondary w-100 mb-5 rounded-0">
            <i class="bi-save pe-2"></i>Dodaj notatkę
        </button>
    </form>
</template>

<script>
export default {
    props: [],
    data: function () {
      return {
        name: null,
        content: null,
      }
    },
    methods: {
        onSubmit: function (){
            const note = { name: this.name, content: this.content };
            this.name = null;
            this.content = null;
            this.$emit('note-add', note);
        }
    }
}
</script>