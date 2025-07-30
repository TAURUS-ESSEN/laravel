               <!--Dieser Datei zeigt die Liste der Benutzer mit der Rolle "user" im Dashboard. -->
               <div class="row">
                    <h3 class="font-semibold text-lg text-gray-800 ">Hexerliste</h3>
                        <table class="table table-striped border border-gray-300  ">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="p-2 text-left">Hexer Name</th>
                                    <th class="p-2 text-left">Status</th>
                                    <th class="p-2">Aktion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr class="border-t border-gray-300">
                                        <td class="p-2">{{ $user->name }}</td>
                                        <td class="p-2">
                                            @if($user->active)
                                                <span class="text-green-500 font-bold"> <i class="fa-solid fa-circle-dot" style="color: #63E6BE;"></i> Aktiv</span>
                                            @else
                                                <span class="text-red-500 font-bold"><i class="fa-solid fa-circle-dot" style="color: #fb1336;"></i> Inaktiv</span>
                                            @endif
                                        </td>
                                        <td class="p-2 text-center">
                                            <!-- Hier kann man Benutzer aktivieren\deaktivieren -->
                                            <form method="POST" action="{{ route('dashboard.toggle', $user) }}">
                                                @csrf
                                                <button type="submit" class="text-blue-500 hover:underline">
                                                    @if($user->active)
                                                        Deaktivieren
                                                    @else
                                                        Aktivieren
                                                    @endif
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>