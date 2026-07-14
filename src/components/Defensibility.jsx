import { motion } from 'framer-motion';
import { Microscope, Leaf, ShieldCheck, TestTubes } from 'lucide-react';

export default function Defensibility() {
  const innovations = [
    {
      icon: <TestTubes size={24} />,
      title: "Formulation Science",
      desc: "Optimising extraction and stabilisation of Neem's active compounds."
    },
    {
      icon: <Microscope size={24} />,
      title: "Efficacy Validation",
      desc: "Structured testing to substantiate product performance claims."
    },
    {
      icon: <Leaf size={24} />,
      title: "New Product Pipeline",
      desc: "Expanding the range of Neem-based health & environmental solutions."
    },
    {
      icon: <ShieldCheck size={24} />,
      title: "Process Innovation",
      desc: "Improving manufacturing efficiency and environmental performance."
    }
  ];

  return (
    <section id="defensibility" className="py-32 bg-bg-body relative border-b border-primary-light/20">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {/* Why Neem Section */}
        <div className="text-center max-w-3xl mx-auto mb-20">
          <span className="text-primary font-bold tracking-wider uppercase text-sm mb-4 block">Our Defensible Moat</span>
          <h2 className="text-4xl md:text-5xl font-serif text-primary-dark mb-6 leading-tight">5,000 Years of Use.<br/>Modern Science Agrees.</h2>
          <p className="text-text-muted font-light text-lg leading-relaxed mb-10">
            Neem (<em>Azadirachta indica</em>) has been used in traditional medicine across Africa and Asia for thousands of years. Modern phytochemical research has since validated many of these traditional claims, identifying compounds such as azadirachtin, nimbin, and nimbidin as responsible for Neem's therapeutic effects.
          </p>
        </div>

        {/* Research & Innovation Pipeline */}
        <div className="bg-primary-dark rounded-xl p-10 md:p-16 text-white relative overflow-hidden shadow-2xl">
          <div className="absolute top-0 right-0 w-[600px] h-[600px] bg-secondary rounded-full mix-blend-multiply opacity-50 translate-x-1/3 -translate-y-1/3 blur-3xl"></div>
          
          <div className="relative z-10 flex flex-col lg:flex-row gap-16">
            <div className="lg:w-1/3">
              <span className="text-accent font-bold tracking-wider uppercase text-sm mb-4 block">Research & Innovation</span>
              <h3 className="text-3xl font-serif mb-6">Where Tradition Meets Laboratory Precision</h3>
              <p className="text-white/80 font-light leading-relaxed mb-8">
                Our innovation pipeline is focused on deepening the science behind Neem-based formulations and expanding their application across new product categories.
              </p>
              <div className="p-6 bg-white/5 border border-white/10 rounded-lg backdrop-blur-sm">
                <h4 className="text-accent font-serif text-lg mb-2">From Leaf to Lab to Life</h4>
                <p className="text-white/70 text-sm font-light">
                  Every EcoNeemTech product passes through a disciplined R&D process, combining indigenous botanical knowledge with structured testing to ensure safety, consistency, and real-world efficacy before it ever reaches a customer.
                </p>
              </div>
            </div>
            
            <div className="lg:w-2/3 grid grid-cols-1 sm:grid-cols-2 gap-6">
              {innovations.map((item, index) => (
                <motion.div
                  key={index}
                  initial={{ opacity: 0, y: 20 }}
                  whileInView={{ opacity: 1, y: 0 }}
                  viewport={{ once: true }}
                  transition={{ duration: 0.8, ease: [0.16, 1, 0.3, 1], delay: index * 0.1 }}
                  className="bg-secondary/40 border border-white/10 p-8 rounded-lg hover:bg-secondary/60 transition-colors"
                >
                  <div className="text-accent mb-6">
                    {item.icon}
                  </div>
                  <h4 className="text-xl font-serif mb-3">{item.title}</h4>
                  <p className="text-white/70 font-light text-sm leading-relaxed">{item.desc}</p>
                </motion.div>
              ))}
            </div>
          </div>
        </div>

      </div>
    </section>
  );
}
