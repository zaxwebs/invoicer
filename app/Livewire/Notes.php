<?php

namespace App\Livewire;

use App\Models\Note;
use App\Models\Invoice;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Notes extends Component
{
	use AuthorizesRequests;
	public $invoiceId;
	public $notes = [];
	public $content = '';
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
		$this->notes = Note::where('invoice_id', $this->invoiceId)
			->latest()
			->get();
	}

	public function create()
	{
		$invoice = Invoice::findOrFail($this->invoiceId);
		$this->authorize('create', [Note::class, $invoice]);
		$this->validate();

		Note::create([
			'invoice_id' => $this->invoiceId,
			'content' => $this->content,
		]);

		$this->refreshNotes();
		$this->dispatch('close-modal', 'create-note');
	}

	public function cancelCreate()
	{
		$this->dispatch('close-modal', 'create-note');
	}

	public function edit($id)
	{
		$note = Note::findOrFail($id);
		$this->authorize('update', $note);
		$this->noteId = $id;
		$this->content = $note->content;
		$this->dispatch('open-modal', 'create-note');
	}

	public function update()
	{
		$this->validate();

		$note = Note::findOrFail($this->noteId);
		$this->authorize('update', $note);
		$note->update(['content' => $this->content]);
		$this->refreshNotes();
		$this->dispatch('close-modal', 'create-note');
	}

	public function delete()
	{
		$note = Note::findOrFail($this->noteId);
		$this->authorize('delete', $note);
		$note->delete();
		$this->refreshNotes();
		$this->dispatch('close-modal', 'create-note');
	}

	private function refreshNotes()
	{
		$this->resetData();
		$this->fetchNotes();
	}

	public function render()
	{
		return view('livewire.notes');
	}
}
