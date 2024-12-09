<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use Statamic\Entries\Entry;

class ImportClients extends Command
{

  protected $clients = [
    ["name" => "Altorfer AG Metallbau", "description" => "Metallbau", "website" => "www.altorfer-ag.ch", "logo" => "stoz.ch-clients-altorfermetallbau.png"],
    ["name" => "Apleona GVA AG", "description" => "Immobilien", "website" => "www.apleona.com", "logo" => "stoz.ch-clients-apleona.png"],
    ["name" => "ARCHI NOVA GmbH", "description" => "Architekturbüro", "website" => "www.archi-nova.ch", "logo" => "stoz.ch-clients-archinova.png"],
    ["name" => "Arztpraxis Hittnau AG", "description" => "Arztpraxis", "website" => "www.arztpraxis-hittnau.ch", "logo" => "stoz.ch-clients-arztpraxishittnau.png"],
    ["name" => "Bagatelle 93", "description" => "Bar/Club", "website" => "www.bagatelle93.ch", "logo" => "stoz.ch-clients-bagatelle.png"],
    ["name" => "Cobedix AG", "description" => "Gesundheitswesen", "website" => "www.cobedix.ch", "logo" => "stoz.ch-clients-cobedias.png"],
    ["name" => "Elamar", "description" => "Residenz und Produkte", "website" => "", "logo" => "stoz.ch-clients-elamar.png"],
    ["name" => "FDP", "description" => "Politische Partei", "website" => "", "logo" => "stoz.ch-clients-fdp.png"],
    ["name" => "Gemeinde Hittnau", "description" => "Gemeindeverwaltung", "website" => "www.hittnau.ch", "logo" => "stoz.ch-clients-gemhittnau.png"],
    ["name" => "Gemeinde Pfäffikon", "description" => "Gemeindeverwaltung", "website" => "www.pfaeffikon.ch", "logo" => "stoz.ch-clients-gempfaeffikon.png"],
    ["name" => "Gewerbeverein Hittnau", "description" => "Gewerbeverein", "website" => "www.gewerbeverein-hittnau.ch", "logo" => "stoz.ch-clients-gewerbevereinhittnau.png"],
    ["name" => "Gewerbeverein Pfäffikon", "description" => "Gewerbeverein", "website" => "www.perle-am-see.ch", "logo" => "stoz.ch-clients-gewerbevereinpfaeffikon.png"],
    ["name" => "GGBP", "description" => "Gemeinnützige Gesellschaft", "website" => "www.ggbp.ch", "logo" => "stoz.ch-clients-ggbp.png"],
    ["name" => "Häpo AG", "description" => "Reifencenter", "website" => "www.haepo.ch", "logo" => "stoz.ch-clients-haepo.png"],
    ["name" => "Hittnau Care", "description" => "Gesundheitszentrum", "website" => "www.hittnaucare.ch", "logo" => "stoz.ch-clients-hittnaucare.png"],
    ["name" => "HR GLAS GmbH", "description" => "Glasmontage", "website" => "www.hr-glas.ch", "logo" => "stoz.ch-clients-hrglas.png"],
    ["name" => "Inmara AG", "description" => "Industrielle Automation", "website" => "www.inmara.com", "logo" => "stoz.ch-clients-inmara.png"],
    ["name" => "Kenny's Auto-Center", "description" => "Automobilhandel", "website" => "www.kennys.ch", "logo" => "stoz.ch-clients-kennys.png"],
    ["name" => "Kessler Bauarbeiten AG", "description" => "Bauunternehmen", "website" => "www.kessler-bauarbeiten.ch", "logo" => "stoz.ch-clients-kessler.png"],
    ["name" => "EKZ Letzipark", "description" => "Einkaufszentrum", "website" => "www.letzipark.ch", "logo" => "stoz.ch-clients-letzipark.png"],
    ["name" => "Löwenzentrum", "description" => "Einkaufszentrum", "website" => "", "logo" => "stoz.ch-clients-loewenzentrum.png"],
    ["name" => "Marco il figaro & barbiere", "description" => "Coiffeur & Barbiere", "website" => "www.marcofigaro.com", "logo" => "stoz.ch-clients-marcoilfigaro.png"],
    ["name" => "MD-Plan GmbH", "description" => "Gebäudetechnikplaner", "website" => "www.md-plan.ch", "logo" => "stoz.ch-clients-mdplan.png"],
    ["name" => "Moro Genki", "description" => "Gesundheitswesen", "website" => "www.moro-genki.ch", "logo" => "stoz.ch-clients-morogenki.png"],
    ["name" => "PEK ARCHITEKTEN AG", "description" => "Architekturbüro", "website" => "www.pekarchitekten.ch", "logo" => "stoz.ch-clients-pek.png"],
    ["name" => "Physiotherapie Hittnau AG", "description" => "Physiotherapie", "website" => "www.physio-hittnau.ch", "logo" => "stoz.ch-clients-physiohittnau.png"],
    ["name" => "Pizza Nation", "description" => "Take Away", "website" => "www.pizzanation.ch", "logo" => "stoz.ch-clients-pizzanation.png"],
    ["name" => "Plaza Shopping", "description" => "Einkaufszentrum", "website" => "", "logo" => "stoz.ch-clients-plazashopping.png"],
    ["name" => "PS Drive Academy", "description" => "Fahrschule", "website" => "www.drive-academy.ch", "logo" => "stoz.ch-clients-psdriveacademy.png"],
    ["name" => "Raiffeisen Zürcher Oberland", "description" => "Bank", "website" => "www.raiffeisen.ch", "logo" => "stoz.ch-clients-raiffeisen.png"],
    ["name" => "Berggasthaus Rosinli", "description" => "Berggasthaus", "website" => "www.rosinli.ch", "logo" => "stoz.ch-clients-rosinli.png"],
    ["name" => "Schmid Wasser & Garten", "description" => "Wasser- & Gartenbau", "website" => "www.schmid-wassergarten.ch", "logo" => "stoz.ch-clients-schmidgarten.png"],
    ["name" => "SD Hockey", "description" => "Hockeyschule", "website" => "www.sd-hockey.ch", "logo" => "stoz.ch-clients-sdhockey.png"],
    ["name" => "SMVC", "description" => "Veterinärmedizin", "website" => "www.swissmobileveterinaryclinic.com", "logo" => "stoz.ch-clients-smvc.png"],
    ["name" => "SOLVER Advisory AG", "description" => "Steuerberatung", "website" => "www.solver-advisory.ch", "logo" => "stoz.ch-clients-solver.png"],
    ["name" => "Sophie Guyer", "description" => "Alterszentrum", "website" => "www.alterszentrum-pfaeffikon.ch", "logo" => "stoz.ch-clients-sophieguyer.png"],
    ["name" => "Spot on!", "description" => "Jugendtheaterverein", "website" => "www.spot-on.ch", "logo" => "stoz.ch-clients-spoton.png"],
    ["name" => "Swiss Council", "description" => "Schweizer Community", "website" => "www.swisscouncil.swiss", "logo" => "stoz.ch-clients-swisscouncil.png"],
    ["name" => "Bauernhof uf Rüti", "description" => "Bauernhof", "website" => "", "logo" => "stoz.ch-clients-ufrueti.png"],
    ["name" => "Volley Uster", "description" => "Sportverein", "website" => "www.volley-uster.ch", "logo" => "stoz.ch-clients-ustervolley.png"],
    ["name" => "Stiftung Wagerenhof", "description" => "Stiftung", "website" => "www.wagerenhof.ch", "logo" => "stoz.ch-clients-wagerenhof.png"],
    ["name" => "Wespi & Partner AG", "description" => "Treuhandunternehmen", "website" => "www.wespipartner.ch", "logo" => "stoz.ch-clients-wespipartner.png"],
    ["name" => "Wildberg Käse AG", "description" => "Käserei", "website" => "www.wildbergkaese.ch", "logo" => "stoz.ch-clients-wildberg.png"],
    ["name" => "Zentrum Oberdorf", "description" => "Einkaufszentrum", "website" => "www.zentrum-oberdorf.ch/intro", "logo" => "stoz.ch-clients-zentrumoberdorf.png"],
    ["name" => "Zürigärtner GmbH", "description" => "Gartenbau", "website" => "www.zürigärtner.ch", "logo" => "stoz.ch-clients-zuerigaertner.png"],
    ["name" => "Zahnarzt Stahel", "description" => "Zahnmedizin", "website" => "www.zahnarztstahel.ch", "logo" => "stoz.ch-clients-zahnarztstahel.png"]
  ];

  protected $signature = 'import:clients';

  protected $description = 'Import clients into the client collection';


  /**
   * Execute the console command.
   *
   * @return int
   */
  public function handle()
  {
    foreach ($this->clients as $client)
    {
      Entry::make()
        ->collection('clients')
        ->data([
          'title' => $client['name'],
          'division' => $client['description'],
          'website' => "https://" . $client['website'],
          'logo' => "clients/" . $client['logo'],
        ])
        ->save();

      $this->info('Imported: ' . $client['name']);
    }

    return 0;
  }

}