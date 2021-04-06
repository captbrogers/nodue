<template>
	<div class="nodue-quicknew">
		<form class="content-editable" @submit.prevent="createNote()">
			<input type="text" class="note-title" v-model="note.title" spellcheck="true" aria-label="Title" placeholder="Title">
			<textarea class="note-body"
				spellcheck="true"
				aria-label="A New Note..."
				placeholder="A New Note..." 
				v-model="note.content"></textarea>
			<div class="note-actions">
				<button type="submit" class="nodue-button">Save</button>
				<button type="button" class="close-button">Cancel</button>
			</div>
		</form>
	</div>
</template>

<script>
// imports go here

export default {
	name: 'QuickNew',

	props: {},

	data() {
		return {
			note: {
				title: '',
				content: '',
				is_pinned: false,
			},
		}
	},

	computed: {},

	mounted() {},

	methods: {
		cancelNewNote() {},

		createNote() {},
	},
}
</script>

<style lang="scss" scoped>
.nodue-quicknew {
	display: flex;
	align-items: center;
	justify-content: center;

	.content-editable {
		border: 1px solid #c3c3c3;
		border-radius: 8px;
		box-shadow: 0 1px 2px 0 rgba(60, 64, 67, 0.3), 0 2px 6px 2px rgba(60, 64, 67, 0.15);
		width: 800px;

		.note-title {
			border-radius: 8px 8px 0 0;
		}

		.note-title, .note-body {
			background-color: white;
			border: none;
			color: #202124;
			padding: 1em;
			font-size: 1.25em;
			line-height: 1.33em;
			margin: 0;
			width: 100%;
		}

		.note-actions {
			border-radius: 0 0 8px 8px;
			padding: 0.75em;
		}
	}
}
</style>
