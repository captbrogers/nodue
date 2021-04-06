<template>
    <div class="nodue-grid">

    <div class="nodue-quicknew">
        <div class="content-editable">
            <div class="note-title" role="textbox" contenteditable="true" spellcheck="true" aria-label="Title">
            </div>
            <div class="note-body" role="textbox" contenteditable="true" spellcheck="true" aria-label="A New Note...">
            </div>
            <div class="note-actions">
                <button type="button" class="close-button">Close</button>
            </div>
        </div>
    </div>

    <div class="nodue-pinned">
        <h3>Pinned Notes</h3>
        <div class="notes-list-wrapper">
            <article class="nodue-note">
                <header class="nodue-note_header">
                    <div class="note-title">Pinned Note Title</div>
                </header>
                <div class="nodue-note_body">
                    Look at fancy me, I'm pinned!
                </div>
            </article>
        </div>
    </div>

    <div class="nodue-notes">
        <h3>Non-pinned Notes</h3>
        <div class="notes-list-wrapper">
            <article class="nodue-note">
                <header class="nodue-note_header">
                    <div class="note-title">The Note Title</div>
                </header>
                <div class="nodue-note_body">
                    A note with a title, unlike others in this list.
                </div>
            </article>
            <article class="nodue-note">
                <header class="nodue-note_header"></header>
                <div class="nodue-note_body">
                    Here is the note body because of things.
                </div>
            </article>
            <article class="nodue-note">
                <header class="nodue-note_header"></header>
                <div class="nodue-note_body">
                    Here is the note body because of things.
                </div>
            </article>
            <article class="nodue-note">
                <header class="nodue-note_header">
                    <div class="note-title">The Note Title</div>
                </header>
                <div class="nodue-note_body">
                    Here is the note body because of things.
                </div>
            </article>
            <article class="nodue-note">
                <header class="nodue-note_header"></header>
                <div class="nodue-note_body">
                    Here is the note body because of things.
                </div>
            </article>
            <article class="nodue-note">
                <header class="nodue-note_header">
                    <div class="note-title">The Note Title</div>
                </header>
                <div class="nodue-note_body">
                    Here is the note body because of things.
                </div>
            </article>
            <article class="nodue-note">
                <header class="nodue-note_header"></header>
                <div class="nodue-note_body">
                    Here is the note body because of things.
                </div>
            </article>
            <article class="nodue-note">
                <header class="nodue-note_header"></header>
                <div class="nodue-note_body">
                    Here is the note body because of things.
                </div>
            </article>
        </div>
    </div>

</div>

</template>

<script>
import ActionButton from '@nextcloud/vue/dist/Components/ActionButton'
import AppContent from '@nextcloud/vue/dist/Components/AppContent'
import AppNavigation from '@nextcloud/vue/dist/Components/AppNavigation'
import AppNavigationItem from '@nextcloud/vue/dist/Components/AppNavigationItem'
import AppNavigationNew from '@nextcloud/vue/dist/Components/AppNavigationNew'

import '@nextcloud/dialogs/styles/toast.scss'
import { generateUrl } from '@nextcloud/router'
import { showError, showSuccess } from '@nextcloud/dialogs'
import axios from '@nextcloud/axios'

export default {
  name: 'App',

  components: {
    ActionButton,
    AppContent,
    AppNavigation,
    AppNavigationItem,
    AppNavigationNew,
  },

  data () {
    return {
      notes: [],
      currentNoteId: null,
      updating: false,
      loading: true,
    }
  },

  computed: {
    currentNote () {
      if (this.currentNoteId === null) {
        return null
      }
      return this.notes.find((note) => {
        note.id === this.currentNoteId
      })
    },

    isSavePossible () {
      return this.currentNote && this.currentNote.title !== ''
    },
  },

  async mounted () {
    try {
      const response = await axios.get(generateUrl('apps/nodue/notes'))
      this.notes = response.data
    } catch (e) {
      console.error(e)
      showError(t('nodue', 'Could not fetch your notes'))
    }
    this.loading = false
  },

  methods: {
    openNote (note) {},

    saveNote () {},

    newNote () {},

    cancelNewNote () {},

    async createNote (note) {},

    async updateNote (note) {},

    async deleteNote (note) {},
  }
}
</script>

<style lang="scss" scoped>

</style>
