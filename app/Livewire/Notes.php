<?php

namespace App\Livewire;

use App\Models\Note;
use Livewire\Component;

class Notes extends Component
{
	public $invoiceId;
	public $notes;
	public $content;

	public $isEditing = false;

	protected $rules = [
		'content' => 'required|string',
	];

	public function mount($invoiceId)
	{
		$this->invoiceId = $invoiceId;
		$this->fetchNotes();
	}

	public function fetchNotes()
	{
		$this->notes = Note::where('invoice_id', $this->invoiceId)->latest()->get();
	}

	public function create()
	{
		$this->validate();

		Note::create([
			'invoice_id' => $this->invoiceId,
			'content' => $this->content,
		]);

		$this->resetCreate();
		$this->fetchNotes();
		$this->dispatch('close-modal', 'create-note');
	}

	public function resetCreate()
	{
		$this->content = '';
	}

	public function cancelCreate()
	{
		$this->resetCreate();
		$this->dispatch('close-modal', 'create-note');
	}

	// public function edit($id)
	// {
	// 	$this->dispatch('open-modal', 'create-note');
	// 	$note = Note::findOrFail($id);
	// 	$this->content = $note->content;
	// }

	// public function updateNote()
	// {
	// 	$this->validate();

	// 	$note = Note::findOrFail($this->noteId);
	// 	$note->update([
	// 		'content' => $this->content,
	// 	]);

	// 	$this->resetCreate();
	// 	$this->fetchNotes();
	// }

	public function delete($id)
	{
		$note = Note::findOrFail($id);
		$note->delete();
		$this->fetchNotes();
	}

	public function render()
	{
		return view('livewire.notes');
	}
}
