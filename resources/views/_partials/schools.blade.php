        <!-- „Auf dieser Seite wird eine Liste aller Magieschulen mit der Möglichkeit zur Löschung angezeigt.“ -->
                        <h3 class="font-semibold text-lg text-gray-800">Liste der Magicschule</h3>
                        @php
                            $magicTypes = [
                            1 => '🔥',
                            2 => '💧',
                            3 => '🌪',
                            4 => '🪨',
                            5 => '🕯️',
                            6 => '💀',
                        ];
                        @endphp
                        <div class="card  p-3">
                            <div class="d-flex gap-2">
                            @foreach($schools as $school)
                            <div class="d-flex border-1">
                                <div class="p-2">{{ $magicTypes[$school->id] }} {{ $school->name }}shule  </div>
                                <form action="{{ route('dashboard.schools.destroy', $school) }}" method="post" >
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" title="Absage"
                                        onclick="return confirm('Wollen Sie die School  {{$school->name}} wirklich löschen? \n!!!!Alle Zaubersprüche dieser Schule werden gelöscht!!!!');"> 
                                        <i class="fa-solid fa-trash-can m-0 h4 me-1"></i>
                                    </button>
                                </form>
                            </div>
                            @endforeach
                            </div>
                            <div class="card bg-warning my-1 p-1" >
                                Da die Tabelle `spells` über das Feld `school_id` (Fremdschlüssel) mit der Tabelle `schools` verknüpft ist, werden beim Löschen einer Magicschule alle zugehörigen Einträge (Zaubersprüche) aus der Tabelle `spells` automatisch gelöscht (kaskadiert). <br />Außerdem werden alle Einträge aus der Tabelle abfrage gelöscht, in denen angegeben ist, dass der Benutzer ein Schüler der gelöschten Magicschule war.
                            </div>
                        </div>