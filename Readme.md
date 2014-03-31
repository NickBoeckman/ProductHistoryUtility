SPDX Product History Utility
=========

<h5>System Overview</h5>

<div>
<p>
The Software Package Data Exchange (SPDX) specification is a formatting standard for communicating the licenses and copyrights associated with a software package. Being able to explicate this information is a required function for operations support system management within an organization.
</p>

<p>
The <a href="https://github.com/joerter/spdx-dashboard">SPDX Dashboard</a> will serve as the central repository for SPDX documents, facilitating uploads, retrieval, modification, and sharing of SPDX documents. THe goal of the Product History Utility (PHU) is to enable a company to create relationships between the SPDX documents and the products that contain those licenses. The PHU wil be created as a component of the SPDX Dashboard. Having the PHU as a part of the SPDX Dashboard will remove the need for maintaining separate databases of license documentation, and increase the overall SPDX toolset.
</p>

<p>
The PHU will create a relationship between a company's products, such as televisions of computers, and the software packages that apply to them. This will allow the PHU to establish relationships between revisions of software, thereby allowing for report generating of license changes to products and packages over time.
</p>

<p>
One of the requirements of companies that distribute licensed software is to notify the consumer of any license changes that may occur to their products. The PHU will provide a simple solution: generated QR codes that are attached to the product at the time of sale will link the consumer back to the license change page.
</p>

<a href="https://docs.google.com/presentation/d/1bs32p6kAmZG2qL2DRdGoJMVAzQpfUpN5Sz5ngCEJAJs/pub?start=false&loop=false&delayms=3000">Brief Presentation</a>
<br>

</div>

<h5>Current Version</h5>
<a href="https://github.com/zwmcfarland/ProductHistoryUtility/blob/master/ChangeLog.md">Version 1.0</a>

<h5>License</h5>
<ul>
  <li>Source  Code: <a href="https://github.com/zwmcfarland/ProductHistoryUtility/blob/master/src/ApacheLicense">Apache 2.0</a></li>
  <li>Documentation: <a href="https://github.com/zwmcfarland/ProductHistoryUtility/blob/master/CCLicense.txt">Creative Commmons BY-SA-3.0</a></li>
</ul>

<h5>Copyright</h5>
copyright © 2014 David Le, Nick Boeckman, Zachary McFarland

<h5>Technical Specifications</h5>
<ul>
  <li>Processor: 4 Ghz</li>
  <li>OS: Ubuntu 12.04 LTS</li>
  <li>Dependencies: Pre-existing instance of the <a href="https://github.com/joerter/spdx-dashboard">SPDX Dashboard</a></li>
  <li>Memory: 16 Gb</li>
</ul>

<h5>System Design</h5>
<ul>
  <li><a href="https://github.com/zwmcfarland/ProductHistoryUtility/blob/master/Documentation/Dataflow%20Diagram%20and%20Decomposition/DataflowDiagram.pdf">Data Flow Diagram</a></li>
</ul>

<h5>Installation</h5>
<ol>
  <li>Install the <a href="https://github.com/joerter/spdx-dashboard">SPDX Dashboard</a></li>
  <li>Copy the contents of the <a href="https://github.com/zwmcfarland/ProductHistoryUtility/tree/master/src">src</a> folder into your web hosted directory in a directory called ProductHistory Utility.</li>
  <li>Depending on how you installed the SPDX Dashboard you may need to update the script and link sources in the Headerfooter.php file to point to the correct location.</li>
</ol>

<h5>Usage</h5>
<ul>
  <li><a href="https://github.com/zwmcfarland/ProductHistoryUtility/tree/master/img">Screen shots</a></li>
  <li><a href="http://54.218.86.78/SPDX/phu/index.php">Working System Example</a></li>
</ul>

<h5>Communities</h5>
SPDX OSS Community

<h5>Communication</h5>
<p>The Product History Utility team can be contacted through the <a href="https://lists.spdx.org/mailman/listinfo/spdx-tech">SPDX-Tech mailing list.</a></p>

<h5>Code Management</h5>
<p>Contributions to the PHU will be decided by a community vote.</p>
<p>Changes to SPDX tooling standards will be brought to an <a href="https://trello.com/b/IfA3oIhe/spdx­tools">advisory board.</a></p>
<p>Any bugs or vulnerabilites can be reported to the <a href="https://github.com/zwmcfarland/ProductHistoryUtility/issues?state=open">ProductHistoryUtility</a>'s repo.</p>
