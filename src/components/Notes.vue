<template>
<div class="nodue-notes">
	<h3>Non-pinned Notes</h3>
	<div class="notes-list-wrapper">
		<Note v-for="note in notes" :note="note" />
	</div>
</div>
</template>

<script>
import Note from './Note.vue'

import '@nextcloud/dialogs/styles/toast.scss'
import { generateUrl } from '@nextcloud/router'
import { showError, showSuccess } from '@nextcloud/dialogs'
import axios from '@nextcloud/axios'

export default {
	name: 'Notes',

	components: {
		Note,
	},

	props: {},

	data () {
		return {
			notes: [],

			loading: true,
		}
	},

	computed: {},

	mounted () {
		this.loadNotes()
	},

	methods: {
		loadNotes() {
			let _this = this

			axios.get(generateUrl('apps/nodue/notes'))
				.then(resp => {
					_this.notes = resp.data
				})
				.catch(erro => {
					showError(t('nodue', 'Could not fetch your notes'))
					console.error(erro)
				})
				.then(() => {
					_this.loading = false
				})
		},
	},
}
</script>

<style lang="scss" scoped>
.nodue-notes {
	margin: 2em 0;
	display: flex;
	flex-direction: column;
	flex-wrap: wrap;
}

.nodue-notes h3 {
	color: #8c8c8c;
	font-size: 0.8em;
	font-weight: bold;
	text-transform: uppercase;
}

.notes-list-wrapper {
	display: grid;
	grid-template-columns: repeat(4, 1fr);
}
</style>
