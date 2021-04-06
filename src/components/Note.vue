<template>
	<article class="nodue-note">
		<header class="nodue-note_header">
			<div v-if="note.title.length > 0" class="note-title">{{ note.title }}</div>
		</header>
		<div class="nodue-note_body">{{ note.content }}</div>
</article>
</template>

<script>
// imports go here

export default {
	name: 'Note',

	props: {
		note: {
			type: Object,
			required: true,
		},
	},

	data() {
		return {}
	},

	computed: {},

	mounted() {},

	methods: {}
}
</script>

<style lang="scss" scoped>
.nodue-note {
	display: flex;
	flex-direction: column;
	border-radius: 8px;
	border: 1px solid #c3c3c3;
	width: 350px;
	margin-right: 2em;
	margin-bottom: 2.5em;
}

.nodue-note_header .note-title,
.nodue-note_body {
	padding: 1em;
}

.nodue-note_header .note-title {
	font-weight: bold;
	font-size: 1.15em;
}
</style>
