                    <!-- Das ist eine Liste der Bewerbungen, die im Dashboard angezeigt werden. Die Bewerbungen werden über das Formular „Bewerbung“ erstellt. Momentan kann man die Bewerbungen nur ablehnen (löschen), in Zukunft kann man das erweitern – „Absage“ wird dann bedeuten, einen neuen Benutzer in die Datenbank aufzunehmen -->
                    <div class="my-2">
                        <h3 class="font-semibold text-lg text-gray-800">Liste der Hexer, die einen Antrag gestellt haben</h3>
                        @php
                                $magicTypes = [
                                    1 => '🔥 Feuerhexer', 
                                    2 => '💧 Wassermagier', 
                                    3 => '🌪 Elementarist', 
                                    4 => '🪨 Druide', 
                                    5 => '🕯️ Schwarzmagier', 
                                    6 => '💀 Nekromant',
                                ];
                        @endphp
                        @foreach($abfragen as $abfrage)
                        <div class="card d-flex flex-column m-1 p-1">
                            <div>{{ $magicTypes[$abfrage->school_id] }} {{ $abfrage->name }} :</div> 
                            <div><q class="fst-italic">{{ substr($abfrage->about, 0, 100) }}</q></div> 
                            <div class="d-flex gap-1">
                                <form action="#" class="d-inline-block">
                                    <button class="btn btn-success" onclick="return alert('Diese Funktion kommt dann in späteren Projekten. Fürs Lernen reicht’s erstmal :)')">Zusage</button>
                                </form>
                                <form action="{{ route('dashboard.abfrage.destroy', $abfrage) }}" method="post" class="d-inline-block">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" title="Absage"
                                        onclick="return confirm('Wollen Sie die Abfrage\n {{$abfrage->name}} \nwirklich löschen?');"> Absage
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>