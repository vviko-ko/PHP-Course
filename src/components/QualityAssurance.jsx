import { motion } from 'framer-motion';
import { Search, FlaskConical, Factory, ShieldCheck, Activity } from 'lucide-react';

export default function QualityAssurance() {
  const steps = [
    {
      num: "01",
      icon: <Search className="w-6 h-6" />,
      title: "Raw Material Screening",
      desc: "Neem inputs are inspected for purity, potency, and consistency before use."
    },
    {
      num: "02",
      icon: <FlaskConical className="w-6 h-6" />,
      title: "Formulation Testing",
      desc: "Each formulation is lab-tested for stability, safety, and efficacy."
    },
    {
      num: "03",
      icon: <Factory className="w-6 h-6" />,
      title: "Production Controls",
      desc: "Standardised manufacturing procedures ensure batch-to-batch consistency."
    },
    {
      num: "04",
      icon: <ShieldCheck className="w-6 h-6" />,
      title: "Finished Product QC",
      desc: "Final products undergo quality checks before release to market."
    },
    {
      num: "05",
      icon: <Activity className="w-6 h-6" />,
      title: "Continuous Monitoring",
      desc: "Ongoing feedback and quality review drive continuous improvement."
    }
  ];

  return (
    <section id="quality" className="py-16 md:py-24 lg:py-32 bg-white relative border-b border-primary-light/20">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="text-center max-w-3xl mx-auto mb-12 md:mb-20">
          <span className="text-primary font-bold tracking-wider uppercase text-xs md:text-sm mb-3 md:mb-4 block">Quality Assurance Process</span>
          <h2 className="text-3xl md:text-4xl lg:text-5xl font-serif text-primary-dark">Quality, Verified at Every Stage</h2>
        </div>
        
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
          {steps.map((step, index) => (
            <motion.div
              key={index}
              initial={{ opacity: 0, y: 30 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ duration: 0.8, ease: [0.16, 1, 0.3, 1], delay: index * 0.1 }}
              className="bg-bg-body p-6 md:p-8 border border-primary-light/30 hover:border-primary transition-colors flex flex-col items-center text-center group"
            >
              <div className="text-primary mb-4 md:mb-6 group-hover:scale-110 transition-transform duration-500">
                {step.icon}
              </div>
              <h3 className="text-4xl md:text-5xl font-serif text-primary-dark/10 mb-3 md:mb-4 group-hover:text-primary-dark/20 transition-colors duration-500">{step.num}</h3>
              <h4 className="text-base md:text-lg font-serif text-primary-dark mb-3 md:mb-4 leading-tight">{step.title}</h4>
              <p className="text-xs md:text-sm font-light text-text-muted leading-relaxed">{step.desc}</p>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
}
