import { motion } from 'framer-motion';

export default function TheProblem() {
  const problems = [
    {
      num: "01",
      title: "Chemical Reliance",
      desc: "Households across Nigeria rely heavily on synthetic, chemical-laden personal care and hygiene products with limited regard for long-term health or environmental impact."
    },
    {
      num: "02",
      title: "The Market Gap",
      desc: "Despite Neem's well-documented natural benefits, there remained a massive gap in professionally developed, accessible Neem-based consumer products in the local market."
    },
    {
      num: "03",
      title: "Consumer Shift",
      desc: "A rapidly growing, environmentally conscious population needs credible, locally-made alternatives that protect both their family's health and the planet."
    }
  ];

  return (
    <section id="story" className="py-16 md:py-24 lg:py-32 bg-white relative border-b border-primary-light/20">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="flex flex-col lg:flex-row gap-12 md:gap-16 lg:gap-20">
          
          {/* Left: Our Story */}
          <div className="lg:w-1/2">
            <motion.div
              initial={{ opacity: 0, x: -30 }}
              whileInView={{ opacity: 1, x: 0 }}
              viewport={{ once: true }}
              transition={{ duration: 0.8, ease: [0.16, 1, 0.3, 1] }}
            >
              <span className="text-primary font-bold tracking-wider uppercase text-xs md:text-sm mb-3 md:mb-4 block">Company Background</span>
              <h2 className="text-3xl md:text-4xl lg:text-5xl font-serif text-primary-dark mb-6 md:mb-8 leading-tight">Our Story</h2>
              <div className="prose prose-base md:prose-lg text-text-muted font-light leading-relaxed">
                <p className="mb-4 md:mb-6">
                  ECONEEMTECH LTD was founded by a team of Nigerian innovators who recognised a simple truth: many of the everyday health, hygiene, and environmental problems facing households and communities can be addressed with solutions nature has already provided.
                </p>
                <p className="mb-4 md:mb-6">
                  Centred on Neem (<em>Azadirachta indica</em>) — a tree long valued across Africa and Asia for its antibacterial, antifungal, and therapeutic properties, the company was established to convert that traditional knowledge into rigorously developed, commercially viable products.
                </p>
                <p>
                  Incorporated in August 2025, EcoNeemTech was built on a single conviction: <strong>that sustainable, natural innovation should be within everyone's reach.</strong>
                </p>
              </div>
            </motion.div>
          </div>

          {/* Right: Why We Were Established (The Problem) */}
          <div className="lg:w-1/2 mt-8 lg:mt-0">
            <motion.div
              initial={{ opacity: 0, y: 30 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ duration: 0.8, ease: [0.16, 1, 0.3, 1], delay: 0.2 }}
            >
              <h3 className="text-xl md:text-2xl font-serif text-primary-dark mb-6 md:mb-8">Why We Were Established</h3>
              
              <div className="space-y-6 md:space-y-8">
                {problems.map((problem, index) => (
                  <div key={index} className="flex gap-4 md:gap-6 items-start group">
                    <div className="text-3xl md:text-4xl font-serif text-primary-dark/20 group-hover:text-primary transition-colors duration-500 pt-1">
                      {problem.num}
                    </div>
                    <div>
                      <h4 className="text-lg md:text-xl font-serif text-primary-dark mb-2">{problem.title}</h4>
                      <p className="text-sm md:text-base text-text-muted font-light leading-relaxed">{problem.desc}</p>
                    </div>
                  </div>
                ))}
              </div>
            </motion.div>
          </div>
          
        </div>
      </div>
    </section>
  );
}
