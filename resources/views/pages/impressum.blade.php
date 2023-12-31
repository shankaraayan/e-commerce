@extends('Layout.Layout')
@section("style")
<style>
    .impressum-left-box a {
        color: #065092;
     }
     
    .impressum-right-box {
        border-radius: 20px 20px 20px 20px;
    }

    .impressum-right-box h5 {
        text-shadow: 0px 0px 2px rgba(0, 0, 0, 0.3);
    }

    
</style>
@endsection

@section("content")
<x-filtter :value="__('DisabledShortBy')" :filterIcon="__('d-none')">impressum</x-filtter>

 <!-- //Design here -->
 <div class="bg-light-blue pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 col-12">
                <div class="impressum-left-box">
                    <h5 class="heading-title nobold fs-4">EU-Streitschlichtung</h5>
                    <p class="heading-text">Die Europäische Kommission stellt eine Plattform zur
                        Online-Streitbeilegung (OS) bereit::<br><a href="https://ec.europa.eu/consumers/odr"
                            target="_blank" rel="noopener">https://ec.europa.eu/consumers/odr.</a><br>Unsere
                        E-Mail-Adresse finden Sie oben im Impressum.</p>
                    <h6 class="nobold mt-3">Verbraucherstreitbeilegung /Universalschlichtungsstelle</h6>
                    <p>Wir nehmen an einem Streitbeilegungsverfahren vor einer Verbraucherschlichtungsstelle teil.
                        Zuständig ist die Universalschlichtungsstelle des Zentrums für Schlichtung e.V., Straßburger
                        Straße 8, 77694 Kehl am Rhein (<a href="https://www.verbraucher-schlichter.de/"
                            target="_blank" rel="noopener">&nbsp;https://www.verbraucher-schlichter.de&nbsp;</a>).
                    </p>
                    <h5 class="nobold fs-4 mt-4">Haftung für Inhalte</h5>
                    <p>Als Dienste Anbieter sind wir gemäß § 7 Abs.1 TMG für eigene Inhalte auf diesen Seiten nach
                        den allgemeinen Gesetzen verantwortlich. Nach §§ 8 bis 10 TMG sind wir als Dienste Anbieter
                        jedoch nicht verpflichtet, übermittelte oder gespeicherte fremde Informationen zu überwachen
                        oder nach Umständen zu forschen, die auf eine rechtswidrige Tätigkeit
                        hinweisen<br><br>Verpflichtungen zur Entfernung oder Sperrung der Nutzung von Informationen
                        nach den allgemeinen Gesetzen bleiben hiervon unberührt. Eine diesbezügliche Haftung ist
                        jedoch erst ab dem Zeitpunkt der Kenntnis einer konkreten Rechtsverletzung möglich. Bei
                        Bekanntwerden von entsprechenden Rechtsverletzungen werden wir diese Inhalte umgehend
                        entfernen.</p>
                    <h5 class="nobold fs-4 mt-4">Haftung für Links</h5>
                    <p>Unser Angebot enthält Links zu externen Websites Dritter, auf deren Inhalte wir keinen
                        Einfluss haben. Deshalb können wir für diese fremden Inhalte auch keine Gewähr übernehmen.
                        Für die Inhalte der verlinkten Seiten ist stets der jeweilige Anbieter oder Betreiber der
                        Seiten verantwortlich. Die verlinkten Seiten wurden zum Zeitpunkt der Verlinkung auf
                        mögliche Rechtsverstöße überprüft. Rechtswidrige Inhalte waren zum Zeitpunkt der Verlinkung
                        nicht erkennbar.</p>
                    <p>Eine permanente inhaltliche Kontrolle der verlinkten Seiten ist jedoch ohne konkrete
                        Anhaltspunkte einer Rechtsverletzung nicht zumutbar. Bei Bekanntwerden von
                        Rechtsverletzungen werden wir derartige Links umgehend entfernen.</p>
                    <h5 class="nobold fs-4 mt-4">Urheberrecht</h5>
                    <p>Die durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten unterliegen dem
                        deutschen Urheberrecht. Die Vervielfältigung, Bearbeitung, Verbreitung und jede Art der
                        Verwertung außerhalb der Grenzen des Urheberrechtes bedürfen der schriftlichen Zustimmung
                        des jeweiligen Autors bzw. Erstellers. Downloads und Kopien dieser Seite sind nur für den
                        privaten, nicht kommerziellen Gebrauch gestattet.</p>
                    <p>Soweit die Inhalte auf dieser Seite nicht vom Betreiber erstellt wurden, werden die
                        Urheberrechte Dritter beachtet. Insbesondere werden Inhalte Dritter als solche
                        gekennzeichnet. Sollten Sie trotzdem auf eine Urheberrechtsverletzung aufmerksam werden,
                        bitten wir um einen entsprechenden Hinweis. Bei Bekanntwerden von Rechtsverletzungen werden
                        wir derartige Inhalte umgehend entfernen.</p>
                    <p><strong>Quellet::</strong><br><a href="https://www.e-recht24.de/impressum-generator.html"
                            target="_blank" rel="noopener">https://www.e-recht24.de/impressum-generator.html</a></p>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-12">
                <div class="impressum-right-box bg-blue-theme p-5">
                    <h2 class="text-white fs-3">Redaktionell Verantwortlicher</h2>
                    <h2 class="text-white fs-4">Angaben gemäß § 5 TMG</h2>
                    <p class="paragraph text-white">
                        Anwendbares Recht und rechtlicher Betreiber der Webseite
                        Diese Webseiten werden von EPP Energy Peak Power Pvt. Ltd., Jaipur, Rajasthan, in Indien
                        gepflegt und betrieben. Die EPP Pvt. Ltd. übernimmt alle haftungsrechtlichen und
                        urheberrechtlichen Ansprüche.
                        Sollten Sie hierzu einen Fall haben wenden Sie sich bitte per Post an:
                        <br><br>
                        <strong>EPP Energy Peak Power Pvt. Ltd</strong><br>
                        CEO. <br>Manish Daiya<br>
                        A-230, Vaishali Nagar
                        Near National Handloom,<br>
                        Jaipur, 302021, Rajasthan, India<br>
                        Mobile: <a href="tel:+919549123423">+91-9549-1234-23</a><br>
                        Office: <a href="tel:+919982902896">+91-9982902896</a><br>
                        Email: <a href="mailto:contact@epp.solar">contact@epp.solar<a>
                    </p>
                    <h5 class="text-white fs-4 mt-5">Niederlassung Deutschland</h5>
                    <p class="text-white">EPP Energy Peak Power GmbH<br>Neuer Wall 50,<br>20354 Hamburg<br>Amtsgericht:
                        Hamburg<br>Handelsregister: HRB 172852</p>
                    <h5 class="text-white fs-4 mt-5">Vertreten durch</h5>
                    <p class="text-white">Patrick Willemer<br>Kontakt<br>Telefon :<a href="tel:+4954196251000"> +49 541 96251000 </a><small>(Montag Bis Freitag : 10:00
                            – 12:30 &amp; 14:00 – 17:00)</small><br>E-Mail: <a href="mailto:contact@epp.solar">contact@epp.solar</a></p>
                    <h5 class="text-white fs-4 mt-5">Umsatzsteuer-ID</h5>
                    <p class="text-white">Umsatzsteuer-Identifikationsnummer gemäß § 27 a<br>Umsatzsteuergesetz: DE349116856</p>
                    <h5 class="text-white fs-4 mt-5">Zentral-Lager Deutschland</h5>
                    <p class="paragraph text-white">
                        EPP Energy Peak Power GmbH<br>
                        Pagenstecherstraße 56<br>
                        49090 Osnabrück<br>
                        Deutschland. </p>
                </div>
            </div>
        </div>
    </div>
 </div>
 

@endsection