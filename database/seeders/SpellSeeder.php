<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Spell;
use Illuminate\Support\Str;

class SpellSeeder extends Seeder
{
    public function run(): void
    {
        $spells = [
            // Feuer (id 1)
            ['Feuerball', 'Ein mächtiger Feuerzauber, der eine brennende Kugel auf den Gegner schleudert und erheblichen Schaden verursacht.', 1, 50],
            ['Flammenwand', 'Erschafft eine breite Wand aus lodernden Flammen, die Gegner auf ihrem Weg verbrennt und zurückdrängt.', 1, 70],
            ['Explosionsblitz', 'Entfesselt eine heftige Feuerexplosion, die in einem Umkreis massiven Schaden verursacht und Gegner in die Luft schleudert.', 1, 90],
            ['Feuersturm', 'Beschwört einen wilden Sturm aus Flammen, der alles in seinem Pfad verbrennt und den Feind in Panik versetzt.', 1, 100],

            // Eis (id 2)
            ['Eislanze', 'Ein scharfer Eisspeer, der mit hoher Geschwindigkeit auf den Gegner geschleudert wird und Frostschaden verursacht.', 2, 40],
            ['Frostnova', 'Lässt eine kalte Explosion um den Zaubernden entstehen, die Gegner einfriert und ihre Bewegungen verlangsamt.', 2, 60],
            ['Eisbarriere', 'Erzeugt eine dicke Schicht aus Eis, die den Zaubernden vor Angriffen schützt und Schaden absorbiert.', 2, 80],
            ['Blizzard', 'Ruft einen heftigen Schneesturm hervor, der Sicht einschränkt und Gegner mit frostigem Schaden schwächt.', 2, 95],

            // Erd (id 3)
            ['Heilung', 'Ein heilender Zauber, der Wunden schließt und die Gesundheit des Zieles über Zeit regeneriert.', 3, 55],
            ['Erdbeben', 'Löst ein starkes Beben aus, das Gegner erschüttert, zu Boden wirft und Schaden verursacht.', 3, 85],
            ['Steinhaut', 'Verleiht dem Zaubernden eine widerstandsfähige Haut, die physischen Schaden stark reduziert.', 3, 75],
            ['Wachstum', 'Beschleunigt das Wachstum von Pflanzen, die zur Unterstützung im Kampf eingesetzt oder Hindernisse beseitigen können.', 3, 30],

            // Luft (id 4)
            ['Blitzschlag', 'Ein schneller, elektrischer Schlag, der den Gegner mit hochspannender Energie durchfährt und lähmt.', 4, 65],
            ['Windstoß', 'Erzeugt einen kräftigen Luftstoß, der Gegner zurückwirft und ihre Balance stört.', 4, 35],
            ['Unsichtbarkeit', 'Lässt den Zaubernden für kurze Zeit unsichtbar werden, um unbemerkt zu agieren oder zu entkommen.', 4, 90],
            ['Sturmruf', 'Beschwört einen gewaltigen Sturm, der Regen, Wind und Blitze kombiniert, um Chaos auf dem Schlachtfeld zu verursachen.', 4, 100],

            // BlackMagic (id 5)
            ['Fluch des Schweigens', 'Verhindert, dass der verfluchte Gegner Zauber oder Fähigkeiten einsetzen kann, solange der Fluch wirkt.', 5, 60],
            ['Schattenklinge', 'Formt eine Klinge aus dunkler Energie, die durch Rüstung schneidet und zusätzlichen Schaden verursacht.', 5, 85],
            ['Dunkler Griff', 'Erzeugt tentakelartige Schatten, die Gegner packen und bewegungsunfähig machen.', 5, 70],
            ['Seelensog', 'Entzieht den Gegnern Lebensenergie und überträgt sie auf den Zaubernden, um ihn zu stärken.', 5, 95],

            // Necromanty (id 6)
            ['Skelettbeschwörung', 'Beschwört einen untoten Skelettkrieger, der dem Zaubernden im Kampf treu zur Seite steht.', 6, 50],
            ['Totenhand', 'Lässt eine riesige, verfallene Hand aus dem Boden hervorschnellen, um Gegner zu greifen und festzuhalten.', 6, 80],
            ['Seelenfessel', 'Bindet die Seele eines Gegners an den Zaubernden, wodurch dieser dessen Bewegungen kontrollieren kann.', 6, 90],
            ['Fleischfaulnis', 'Verursacht, dass das Fleisch der Gegner verfault und sie an Stärke verlieren und Schaden erleiden.', 6, 65],
        ];

        foreach ($spells as $spell) {
            Spell::create([
                'name' => $spell[0],
                'description' => $spell[1],
                'school_id' => $spell[2],
                'price' => $spell[3],
                'slug' => Str::slug($spell[0]),
            ]);
        }
    }
}
