<?php

namespace App\Livewire;

use App\Models\Note;
use Livewire\Component;
use Livewire\Attributes\On;

class Notes extends Component
{
	public $invoiceId;
	public $notes;
	public $content;

	public $isEditing = false;
	public $noteId = null;

	protected $rules = [
		'content' => 'required|string',
	];

	public function mount($invoiceId)
	{
		$this->invoiceId = $invoiceId;
		$this->fetchNotes();
	}

	public function resetData()
	{
		$this->noteId = null;
		$this->content = '';
	}

	#[On('closed-modal')]
	public function close($name)
	{
		if ($name === 'create-note') {
			$this->resetData();
		}
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

		$this->resetData();

		$this->fetchNotes();
		$this->dispatch('close-modal', 'create-note');
	}



	public function cancelCreate()
	{
		$this->dispatch('close-modal', 'create-note');
	}

	public function edit($id)
	{
		$this->noteId = $id;
		$this->dispatch('open-modal', 'create-note');
		$note = Note::findOrFail($id);
		$this->content = $note->content;
	}

	public function update()
	{
		$this->validate();
		$note = Note::findOrFail($this->noteId);
		$note->update([
			'content' => $this->content,
		]);

		$this->resetData();
		$this->dispatch('close-modal', 'create-note');

		$this->fetchNotes();
	}

	public function delete()
	{
		$note = Note::findOrFail($this->noteId);
		$note->delete();

		$this->resetData();
		$this->dispatch('close-modal', 'create-note');

		$this->fetchNotes();
	}

	public function render()
	{
		return view('livewire.notes');
	}
}
