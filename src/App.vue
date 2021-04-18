<template>
  <div class="container-fluid p-0 m-0 h-100 text-body">
    <div class="row p-0 m-0 h-100">
      <div class="col-12 col-md-5 col-lg-4 bg-light p-0 h-100">
        <h3 class="w-100 text-center p-4">
          <i class="bi-clipboard-check text-secondary"></i> GoNote
        </h3>
        <button type="button" class="btn btn-dark w-100 py-2 rounded-0" v-on:click="onShowAddForm()">
          <i class="bi-pen-fill text-white"></i> Stwórz nową notatkę
        </button>
          <notes-list
            v-bind:notes="notes"
            v-on:note-remove="onRemoveNote($event)"
            v-on:note-show="onShowNote($event)">
          </notes-list>
      </div>
      <div class="col-12 col-md-7 col-lg-8 bg-white p-0 h-100">
        <div class="cover"></div>
        <div class="p-5 h-50">
          <note v-if="currentNote !== null" v-on:note-remove="onRemoveNote($event)" v-bind:note="currentNote"></note>
          <add-note-form v-else-if="showAddForm" v-on:note-add="onAddNote($event)"></add-note-form>
          <div v-else class="alert alert-secondary rounded-0" role="alert">
            Brak aktywnej notatki
          </div>
        </div>
      </div>
    </div>
    <nav class="navbar fixed-bottom navbar-dark bg-dark">
      <div class="container-fluid justify-content-end p-2">
        <span class="text-muted mx-5 d-none d-md-block">©2021 Polityka prywatności | Warunki korzystania z usługi</span>
        <span class="text-light"><i class="bi-heart-fill pe-2"></i>Moje konto</span>
      </div>
    </nav>
  </div>
</template>

<script>
  import NotesList from "./components/NotesList.vue";
  import AddNoteForm from "./components/AddNoteForm.vue";
  import Note from "./components/Note.vue";

  export default {
    components: {
      NotesList,
      AddNoteForm,
      Note
    },
    data: function () {
      return {
        notes: [],
        showAddForm: false,
        currentNote: null,
      }
    },
    methods: {
      onAddNote: function (note){
        var newNote = {
          name: note.name,
          content: note.content,
        };
        this.$http.post('notes', newNote).then((response) => {
          this.notes.push(response.data);
          this.showAddForm = false;
          this.currentNote = response.data;
        });
      },
      onShowAddForm: function (){
        this.currentNote = null;
        this.showAddForm = true;
      },
      onRemoveNote: function (note){
        this.$http.delete(`notes/${note.id}`).then(() => {
          this.showAddForm = false;
          this.currentNote = null;
          this.loadNotes();
        });
      },
      loadNotes: function () {
        this.$http.get('notes').then(response => {
          this.notes = response.data;
        });
      },
      onShowNote: function (note){
        this.showAddForm = false;
        this.currentNote = note;
      }
    },
    mounted() {
        this.loadNotes();
    }
  };
</script>

<style>
  html,
  body,
  #app {
	height: 100%;
  }

  .cover {
    background-image: url("./assets/background.jpg");
    background-position: center;
    background-size: cover;
    height: 30%;
  }
</style>
